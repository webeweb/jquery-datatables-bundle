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
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Component\Translation\BaseTranslatorInterface;
use WBW\Bundle\CoreBundle\Service\RouterTrait;
use WBW\Bundle\CoreBundle\Service\TranslatorTrait;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Library\Core\Renderer\DateTimeRenderer;

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
     * @param BaseTranslatorInterface $translator The translator.
     * @param ButtonTwigExtension $buttonTwigExtension The button Twig extension.
     */
    public function __construct(RouterInterface $router, $translator, ButtonTwigExtension $buttonTwigExtension) {
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
     * Render an action button "delete".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "delete".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderActionButtonDelete($entity, string $route): string {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

        $args = "wbw_jquery_datatables_delete" === $route ? ["name" => $this->getName()] : [];

        $title  = $this->getTranslator()->trans("label.delete", [], "WBWJQueryDataTablesBundle");
        $button = $this->getButtonTwigExtension()->bootstrapButtonDangerFunction(["icon" => "fa:trash", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, array_merge($args, ["id" => $entity->getId()]));

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Render an action button "duplicate".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "duplicate".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderActionButtonDuplicate($entity, string $route): string {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

        $title  = $this->getTranslator()->trans("label.duplicate", [], "WBWJQueryDataTablesBundle");
        $button = $this->getButtonTwigExtension()->bootstrapButtonDefaultFunction(["icon" => "fa:copy", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Render an action button "edit".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "edit".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderActionButtonEdit($entity, string $route): string {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

        $title  = $this->getTranslator()->trans("label.edit", [], "WBWJQueryDataTablesBundle");
        $button = $this->getButtonTwigExtension()->bootstrapButtonDefaultFunction(["icon" => "fa:pen", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Render an action button "show".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "show".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory exception is missing.
     */
    protected function renderActionButtonShow($entity, string $route): string {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

        $title  = $this->getTranslator()->trans("label.show", [], "WBWJQueryDataTablesBundle");
        $button = $this->getButtonTwigExtension()->bootstrapButtonInfoFunction(["icon" => "fa:eye", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
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
     * @deprecated since 3.4.0 use {@see WBW\Bundle\JQuery\DataTablesBundle\Provider\AbstractDataTablesProvider::renderRowButtons()} instead
     */
    protected function renderButtons($entity, string $editRoute, string $deleteRoute = null, bool $enableDelete = true): string {
        if (null === $deleteRoute && true === $enableDelete) {
            $deleteRoute = "wbw_jquery_datatables_delete";
        }
        return $this->renderRowButtons($entity, $editRoute, $deleteRoute);
    }

    /**
     * Render a date.
     *
     * @param DateTime|null $date The date.
     * @param string $format The format.
     * @return string Returns the rendered date.
     */
    protected function renderDate(?DateTime $date, string $format = "Y-m-d"): string {
        return DateTimeRenderer::renderDateTime($date, $format);
    }

    /**
     * Render a date/time.
     *
     * @param DateTime|null $date The date/time.
     * @param string $format The format.
     * @return string Returns the rendered date/time.
     */
    protected function renderDateTime(?DateTime $date, string $format = DateTimeRenderer::DATETIME_FORMAT): string {
        return DateTimeRenderer::renderDateTime($date, $format);
    }

    /**
     * Render a float.
     *
     * @param float|null $number The number.
     * @param int $decimals The decimals.
     * @param string $decPoint The decimal point.
     * @param string $thousandsSep The thousands separator.
     * @return string Returns the rendered number.
     */
    protected function renderFloat(?float $number, int $decimals = 2, string $decPoint = ".", string $thousandsSep = ","): string {
        if (null === $number) {
            return "";
        }
        return number_format($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     * {@inheritdoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException(sprintf("The entity must implements DataTablesEntityInterface or declare a getId() method"));
        }

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
     * @return string Returns the wrapped content.
     */
    protected function wrapContent(?string $prefix, string $content, ?string $suffix): string {

        $output = [
            $content,
        ];

        if (null !== $prefix) {
            array_unshift($output, $prefix);
        }
        if (null !== $suffix) {
            array_push($output, $suffix);
        }

        return implode("", $output);
    }
}
