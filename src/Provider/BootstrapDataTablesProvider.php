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
use WBW\Bundle\BootstrapBundle\Renderer\Utility\CenterAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Utility\JustifiedAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Utility\LeftAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Renderer\Utility\RightAlignedTextRendererTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Routing\RouterTrait;
use WBW\Bundle\DataTablesBundle\Renderer\BootstrapButtonRendererTrait;
use WBW\Library\Symfony\Renderer\DateTimesRendererTrait;
use WBW\Library\Symfony\Renderer\Floats\FloatRendererTrait;
use WBW\Library\Symfony\Renderer\Strings\StringWrapperTrait;
use WBW\Library\Symfony\Renderer\StringsRendererTrait;

/**
 * Bootstrap DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 * @abstract
 */
abstract class BootstrapDataTablesProvider extends DefaultDataTablesProvider {

    use RouterTrait;

    // Bootstrap renderers
    use CenterAlignedTextRendererTrait;
    use JustifiedAlignedTextRendererTrait;
    use LeftAlignedTextRendererTrait;
    use RightAlignedTextRendererTrait;

    // Bootstrap Twig extension
    use ButtonTwigExtensionTrait;

    // DataTables renderer
    use BootstrapButtonRendererTrait;

    // Common renderers
    use DateTimesRendererTrait;
    use FloatRendererTrait;
    use StringsRendererTrait;
    use StringWrapperTrait;

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator The translator.
     * @param RouterInterface $router The router.
     * @param ButtonTwigExtension $buttonTwigExtension The button Twig extension.
     */
    public function __construct(TranslatorInterface $translator, RouterInterface $router, ButtonTwigExtension $buttonTwigExtension) {
        parent::__construct($translator);

        $this->setButtonTwigExtension($buttonTwigExtension);
        $this->setRouter($router);
    }

    /**
     * Render the row buttons.
     *
     * @param object $entity The entity.
     * @param string|null $showRoute The show route.
     * @param string|null $editRoute The edit route.
     * @param string|null $deleteRoute The delete route.
     * @return string Returns the DataTables row buttons.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderRowButtons($entity, string $showRoute = null, string $editRoute = null, string $deleteRoute = null): string {

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
}
