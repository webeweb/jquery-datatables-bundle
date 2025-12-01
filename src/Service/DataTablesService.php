<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Doctrine\ORM\EntityManagerTrait;
use WBW\Bundle\CommonBundle\Routing\RouterTrait;
use WBW\Bundle\CommonBundle\Security\Core\User\UserTrait;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesColumnException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesCsvExporterException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesEditorException;
use WBW\Bundle\DataTablesBundle\Exception\BadDataTablesRepositoryException;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesEntityInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesRouterInterface;
use WBW\Bundle\DataTablesBundle\Repository\DataTablesRepositoryInterface;
use WBW\Library\Common\Logger\LoggerTrait;

/**
 * DataTables service.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Service
 */
class DataTablesService implements DataTablesServiceInterface {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }
    use EntityManagerTrait;
    use LoggerTrait;
    use RouterTrait;
    use UserTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.service";

    /**
     * Constructor.
     *
     * @param EntityManagerInterface $entityManager The entity manager.
     * @param LoggerInterface $logger The logger.
     * @param RouterInterface $router The router.
     * @param UserInterface|null $user The user.
     */
    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger, RouterInterface $router, ?UserInterface $user = null) {
        $this->setEntityManager($entityManager);
        $this->setLogger($logger);
        $this->setRouter($router);
        $this->setUser($user);
    }

    /**
     * Get a column.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @param string $data The data.
     * @return DataTablesColumnInterface Returns the column.
     * @throws BadDataTablesColumnException Throws a bad column exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesColumn(DataTablesProviderInterface $dtProvider, string $data): DataTablesColumnInterface {

        $dtWrapper = $this->getDataTablesWrapper($dtProvider);

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
            "_wrapper"  => get_class($dtWrapper),
        ];

        $this->logInfo(sprintf('DataTables service search for a column with name "%s"', $data), $context);

        $dtColumn = $dtWrapper->getColumn($data);
        if (null === $dtColumn) {
            throw new BadDataTablesColumnException($data);
        }

        $context["_column"] = get_class($dtColumn);

        $this->logInfo(sprintf('DataTables service found a column with name "%s"', $data), $context);

        return $dtColumn;
    }

    /**
     * {@inheritDoc}
     */
    public function getDataTablesCsvExporter(DataTablesProviderInterface $dtProvider): DataTablesCsvExporterInterface {

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables service search for a CSV exporter with name "%s"', $dtProvider->getName()), $context);

        $dtExporter = $dtProvider->getCsvExporter();
        if (false === ($dtExporter instanceof DataTablesCsvExporterInterface)) {
            throw new BadDataTablesCsvExporterException($dtExporter);
        }

        $context["_exporter"] = get_class($dtExporter);

        $this->logInfo(sprintf('DataTables service found a CSV exporter with name "%s"', $dtProvider->getName()), $context);

        return $dtExporter;
    }

    /**
     * {@inheritDoc}
     */
    public function getDataTablesEditor(DataTablesProviderInterface $dtProvider): DataTablesEditorInterface {

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables service search for an editor with name "%s"', $dtProvider->getName()), $context);

        $dtEditor = $dtProvider->getEditor();
        if (false === ($dtEditor instanceof DataTablesEditorInterface)) {
            throw new BadDataTablesEditorException($dtEditor);
        }

        $context["_editor"] = get_class($dtEditor);

        $this->logInfo(sprintf('DataTables service found an editor with name "%s"', $dtProvider->getName()), $context);

        return $dtEditor;
    }

    /**
     * {@inheritDoc}
     */
    public function getDataTablesEntityById(DataTablesProviderInterface $dtProvider, $id) {

        /** @var EntityRepository<DataTablesEntityInterface> $repository */
        $repository = $this->getDataTablesRepository($dtProvider);

        $context = [
            "_service"    => get_class($this),
            "_provider"   => get_class($dtProvider),
            "_repository" => get_class($repository),
        ];

        $this->logInfo(sprintf("DataTables service search for an entity with id [%s]", $id), $context);

        $entity = $repository->find($id);
        if (null === $entity) {
            throw EntityNotFoundException::fromClassNameAndIdentifier($dtProvider->getEntity(), [$id]);
        }

        $context["_entity"] = get_class($entity);

        $this->logInfo(sprintf("DataTables service found an entity with id [%s]", $id), $context);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function getDataTablesProvider(string $name): DataTablesProviderInterface {

        $dtManager = $this->getDataTablesManager();

        $context = [
            "_service" => get_class($this),
            "_manager" => get_class($dtManager),
        ];

        $this->logInfo(sprintf('DataTables service search for a provider with name "%s"', $name), $context);

        $dtProvider = $dtManager->getProvider($name);

        $context["_provider"] = get_class($dtProvider);

        $this->logInfo(sprintf('DataTables service found a provider with name "%s"', $name), $context);

        return $dtProvider;
    }

    /**
     * Get a repository.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return DataTablesRepositoryInterface Returns the repository.
     * @throws BadDataTablesRepositoryException Throws a bad repository exception.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function getDataTablesRepository(DataTablesProviderInterface $dtProvider): DataTablesRepositoryInterface {

        $em = $this->getEntityManager();

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
            "_entity"   => $dtProvider->getEntity(),
        ];

        $this->logInfo(sprintf('DataTables service search for a repository with name "%s"', $dtProvider->getName()), $context);

        /** @var EntityRepository<DataTablesEntityInterface> $repository */
        $repository = $em->getRepository($dtProvider->getEntity());
        if (false === ($repository instanceof DataTablesRepositoryInterface)) {
            throw new BadDataTablesRepositoryException($repository);
        }

        $context["_repository"] = get_class($repository);

        $this->logInfo(sprintf('DataTables service found a repository with name "%s"', $dtProvider->getName()), $context);

        /** @var DataTablesRepositoryInterface $repository */
        return $repository;
    }

    /**
     * {@inheritDod}
     */
    public function getDataTablesUrl(DataTablesProviderInterface $dtProvider): string {

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
        ];

        $this->logInfo(sprintf('DataTables service search for an URL with name "%s"', $dtProvider->getName()), $context);

        if (true === ($dtProvider instanceof DataTablesRouterInterface)) {
            $url = $dtProvider->getUrl();
        } else {
            $url = $this->getRouter()->generate("wbw_datatables_index", ["name" => $dtProvider->getName()]);
        }

        $context["_url"] = $url;

        $this->logInfo(sprintf('DataTables service found for an URL with name "%s"', $dtProvider->getName()), $context);

        return $url;
    }

    /**
     * {@inheritDoc}
     */
    public function getDataTablesWrapper(DataTablesProviderInterface $dtProvider): DataTablesWrapperInterface {

        $dtWrapper = DataTablesFactory::newWrapper($this->getDataTablesUrl($dtProvider), $dtProvider, $this->getUser());

        $context = [
            "_service"  => get_class($this),
            "_provider" => get_class($dtProvider),
            "_wrapper"  => get_class($dtWrapper),
        ];

        foreach ($dtProvider->getColumns() as $dtColumn) {

            $this->logInfo(sprintf('DataTables service add a column "%s" with the provider "%s"', $dtColumn->getData(), $dtProvider->getName()), $context);

            $dtWrapper->addColumn($dtColumn);
        }

        if (null !== $dtProvider->getOptions()) {
            $dtWrapper->setOptions($dtProvider->getOptions());
        }

        return $dtWrapper;
    }

    /**
     * Log an info.
     *
     * @param string $message The message.
     * @param mixed[] $context The context.
     * @return DataTablesServiceInterface Returns this DataTables service.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function logInfo(string $message, array $context = []): DataTablesServiceInterface {
        $this->getLogger()->info($message, $context);
        return $this;
    }
}
