<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use DateTime;
use InvalidArgumentException;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Renderer\DateTimeRenderer;
use WBW\Bundle\CoreBundle\Service\RouterTrait;
use WBW\Bundle\CoreBundle\Service\TranslatorTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Entity\DataTablesEntityInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;

/**
 * Abstract DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
 */
abstract class AbstractDataTablesProvider implements DataTablesProviderInterface {

    use ButtonTwigExtensionTrait;
    use RouterTrait;
    use TranslatorTrait;

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
    public function getCSVExporter() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions() {

        $dtOptions = DataTablesFactory::newOptions();
        $dtOptions->addOption("responsive", true);
        $dtOptions->addOption("searchDelay", 1000);

        return $dtOptions;
    }

    /**
     * Render the DataTables buttons.
     *
     * @param DataTablesEntityInterface $entity The entity.
     * @param string $editRoute The edit route.
     * @param string $deleteRoute The delete route.
     * @param bool $enableDelete Enable delete ?
     * @return string Returns the DataTables buttons.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     * @deprecated since 3.4.0 use "WBW\Bundle\JQuery\DataTablesBundle\Provider\AbstractDataTablesProvider::renderRowButtons()" instead
     */
    protected function renderButtons($entity, $editRoute, $deleteRoute = null, $enableDelete = true) {
        if (null === $deleteRoute && true === $enableDelete) {
            $deleteRoute = "wbw_jquery_datatables_delete";
        }
        return $this->renderRowButtons($entity, $editRoute, $deleteRoute, null);
    }

    /**
     * Render a date.
     *
     * @param DateTime $date The date.
     * @param string $format The format.
     * @return string Returns the rendered date.
     */
    protected function renderDate(DateTime $date = null, $format = "Y-m-d") {
        return DateTimeRenderer::renderDateTime($date, $format);
    }

    /**
     * Render a date/time.
     *
     * @param DateTime $date The date/time.
     * @param string $format The format.
     * @return string Returns the rendered date/time.
     */
    protected function renderDateTime(DateTime $date = null, $format = DateTimeRenderer::DATETIME_FORMAT) {
        return DateTimeRenderer::renderDateTime($date, $format);
    }

    /**
     * Render a float.
     *
     * @param float $number The number.
     * @param int $decimals The decimals.
     * @param string $decPoint The decimal point.
     * @param string $thousandsSep The thousands separator.
     * @return string Returns the rendered number.
     */
    protected function renderFloat($number, $decimals = 2, $decPoint = ".", $thousandsSep = ",") {
        if (null === $number) {
            return "";
        }
        return number_format($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     * Render the DataTables row buttons.
     *
     * @param DataTablesEntityInterface $entity The entity.
     * @param string|null $editRoute The edit route.
     * @param string|null $deleteRoute The delete route.
     * @param string|null $showRoute The show route.
     * @return string Returns the DataTables row buttons.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderRowButtons($entity, $editRoute = null, $deleteRoute = null, $showRoute = null) {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

        $output = [];

        $titles   = [];
        $titles[] = $this->getTranslator()->trans("label.edit", [], "WBWJQueryDataTablesBundle");
        $titles[] = $this->getTranslator()->trans("label.delete", [], "WBWJQueryDataTablesBundle");
        $titles[] = $this->getTranslator()->trans("label.show", [], "WBWJQueryDataTablesBundle");

        $buttons   = [];
        $buttons[] = $this->getButtonTwigExtension()->bootstrapButtonDefaultFunction(["icon" => "fa:pen", "title" => $titles[0], "size" => "xs"]);
        $buttons[] = $this->getButtonTwigExtension()->bootstrapButtonDangerFunction(["icon" => "fa:trash", "title" => $titles[1], "size" => "xs"]);
        $buttons[] = $this->getButtonTwigExtension()->bootstrapButtonInfoFunction(["icon" => "fa:eye", "title" => $titles[2], "size" => "xs"]);

        $urls = [];

        if (null !== $editRoute) {

            $urls[]   = $this->getRouter()->generate($editRoute, ["id" => $entity->getId()]);
            $output[] = $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($buttons[0], $urls[0]);
        }

        if (null !== $deleteRoute) {

            $args = "wbw_jquery_datatables_delete" === $deleteRoute ? ["name" => $this->getName()] : [];

            $urls[]   = $this->getRouter()->generate($deleteRoute, array_merge($args, ["id" => $entity->getId()]));
            $output[] = $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($buttons[1], $urls[1]);
        }

        if (null !== $showRoute) {

            $urls[]   = $this->getRouter()->generate($showRoute, ["id" => $entity->getId()]);
            $output[] = $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($buttons[2], $urls[2]);
        }

        return implode(" ", $output);
    }

    /**
     * Wrap a content.
     *
     * @param string|null $prefix The prefix
     * @param string $content The content.
     * @param string|null $suffix The suffix.
     * @return string Returns the wrapped content.
     */
    protected function wrapContent($prefix, $content, $suffix) {

        $output = [];

        if (null !== $prefix) {
            $output[] = $prefix;
        }
        $output[] = $content;
        if (null !== $suffix) {
            $output[] = $suffix;
        }

        return implode("", $output);
    }
}
