<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;

/**
 * DataTables provider list command.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Command
 */
class DataTablesProviderListCommand extends AbstractCommand {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }

    /**
     * Command name.
     *
     * @var string
     */
    public const COMMAND_NAME = "wbw:datatables:provider:list";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.datatables.command.provider_list";

    /**
     * {@inheritDoc}
     */
    protected function configure(): void {
        $this
            ->setDescription("List the DataTables providers")
            ->setHelp(static::formatHelp("list the DatTables providers"))
            ->setName(self::COMMAND_NAME);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int {

        $io = $this->newStyle($input, $output);
        $this->displayTitle($io, $this->getDescription());

        $rows = [];

        /** @var DataTablesProviderInterface $current */
        foreach ($this->getDataTablesManager()->getProviders() as $current) {
            $rows[] = $this->renderRow($current);
        }

        $this->sortRows($rows);

        $io->table($this->getHeaders(), $rows);
        $this->displayFooter($io, count($rows), "command.footer.provider_list.success", "command.footer.provider_list.warning", WBWDataTablesBundle::getTranslationDomain(), "en");

        return 0;
    }

    /**
     * Get the headers.
     *
     * @return string[] Returns the headers.
     */
    protected function getHeaders(): array {

        return [
            $this->translate("command.header.name", [], WBWDataTablesBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.service", [], WBWDataTablesBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.columns", [], WBWDataTablesBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.prefix", [], WBWDataTablesBundle::getTranslationDomain(), "en"),
            $this->translate("command.header.view", [], WBWDataTablesBundle::getTranslationDomain(), "en"),
            "CSV",
        ];
    }

    /**
     * Render a row.
     *
     * @param DataTablesProviderInterface $provider The provider.
     * @return string[] Returns the rendered row.
     */
    protected function renderRow(DataTablesProviderInterface $provider): array {

        $length = strlen($this->getHeaders()[2]);
        $format = "%{$length}d";

        return [
            $provider->getName(),
            implode(PHP_EOL, [
                get_class($provider),
                "└ " . $provider->getEntity(),
            ]),
            sprintf($format, count($provider->getColumns())),
            $provider->getPrefix(),
            $provider->getView(),
            static::formatCheckbox($provider instanceof DataTablesCsvExporterInterface),
        ];
    }
}
