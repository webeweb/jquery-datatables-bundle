<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Provider;

use InvalidArgumentException;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\BootstrapBundle\Renderer\CenterAlignedRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\RightAlignedRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Strings\CenterAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Strings\JustifiedAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Strings\LeftAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Strings\RightAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Routing\RouterTrait;
use WBW\Bundle\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\DataTablesBundle\Renderer\ColumnWidthInterface;
use WBW\Bundle\DataTablesBundle\Renderer\Floats\FloatRendererTrait;
use WBW\Bundle\DataTablesBundle\Translation\TranslatorTrait;
use WBW\Library\Symfony\Renderer\DateTimesRendererTrait;
use WBW\Library\Symfony\Renderer\Strings\StringWrapperTrait;
use WBW\Library\Symfony\Renderer\StringsRendererTrait;

/**
 * Abstract DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 * @abstract
 */
abstract class AbstractDataTablesProvider implements DataTablesProviderInterface, ColumnWidthInterface {

    use ButtonTwigExtensionTrait;
    use RouterTrait;
    use TranslatorTrait;

    use DataTablesButtonsRendererTrait;

    use DateTimesRendererTrait;
    use FloatRendererTrait;
    use StringsRendererTrait;
    use StringWrapperTrait;

    use CenterAlignedTextRendererTrait;
    use JustifiedAlignedTextRendererTrait;
    use LeftAlignedTextRendererTrait;
    use RightAlignedTextRendererTrait;

    use CenterAlignedRendererTrait;
    use RightAlignedRendererTrait;

    /**
     * Constructor.
     *
     * @param RouterInterface $router The router.
     * @param TranslatorInterface $translator The translator.
     * @param ButtonTwigExtension $buttonTwigExtension The button Twig extension.
     */
    public function __construct(RouterInterface $router, TranslatorInterface $translator, ButtonTwigExtension $buttonTwigExtension) {
        $this->setButtonTwigExtension($buttonTwigExtension);
        $this->setRouter($router);
        $this->setTranslator($translator);
    }

    /**
     * {@inheritDoc}
     */
    public function getCSVExporter(): ?DataTablesCSVExporterInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): ?string {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): DataTablesOptionsInterface {

        $dtOptions = DataTablesFactory::newOptions();
        $dtOptions->addOption("order", [[0, "asc"]]);
        $dtOptions->addOption("responsive", true);
        $dtOptions->addOption("searchDelay", 1000);

        return $dtOptions;
    }

    /**
     * Render the DataTables buttons.
     *
     * @param object $entity The entity.
     * @param string $editRoute The edit route.
     * @param string|null $deleteRoute The delete route.
     * @param bool $enableDelete Enable delete ?
     * @return string Returns the DataTables buttons.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     * @deprecated since 3.4.0 use {@see WBW\Bundle\DataTablesBundle\Provider\AbstractDataTablesProvider::renderRowButtons()} instead
     */
    protected function renderButtons($entity, string $editRoute, string $deleteRoute = null, bool $enableDelete = true): string {

        if (null === $deleteRoute && true === $enableDelete) {
            $deleteRoute = "wbw_datatables_delete";
        }

        return $this->renderRowButtons($entity, $editRoute, $deleteRoute);
    }

    /**
     * {@inheritDoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        DataTablesEntityHelper::isCompatible($entity, true);

        switch ($dtRow) {

            case DataTablesResponseInterface::DATATABLES_ROW_ATTR:
                return ["data-id" => $entity->getId()];

            case DataTablesResponseInterface::DATATABLES_ROW_DATA:
                return ["pkey" => $entity->getId()];

            case DataTablesResponseInterface::DATATABLES_ROW_ID:
                return implode("-", [$this->getName(), $entity->getId()]);
        }

        return null;
    }

    /**
     * Render the DataTables row buttons.
     *
     * @param object $entity The entity.
     * @param string|null $editRoute The edit route.
     * @param string|null $deleteRoute The delete route.
     * @param string|null $showRoute The show route.
     * @return string Returns the DataTables row buttons.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderRowButtons($entity, string $editRoute = null, string $deleteRoute = null, string $showRoute = null): string {

        $anchors = [];

        if (null !== $showRoute) {
            $anchors[] = $this->renderActionButtonShow($entity, $showRoute);
        }

        if (null !== $editRoute) {
            $anchors[] = $this->renderActionButtonEdit($entity, $editRoute);
        }

        if (null !== $deleteRoute) {
            $anchors[] = $this->renderActionButtonDelete($entity, $deleteRoute);
        }

        return implode(" ", $anchors);
    }

    /**
     * Wrap a content.
     *
     * @param string|null $prefix The prefix
     * @param string $content The content.
     * @param string|null $suffix The suffix.
     * @return string|null Returns the wrapped content.
     */
    protected function wrapContent(?string $prefix, string $content, ?string $suffix): ?string {
        return $this->wrapString($content, $prefix, $suffix);
    }
}
