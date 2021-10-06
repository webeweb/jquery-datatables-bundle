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
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesOptionsInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\DateRendererTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\DateTimeRendererTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\FloatRendererTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\StringWrapperTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Translation\TranslatorInterface;

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

    use DateRendererTrait;
    use DateTimeRendererTrait;
    use FloatRendererTrait;
    use StringWrapperTrait;

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
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
        }

        $args = "wbw_jquery_datatables_delete" === $route ? ["name" => $this->getName()] : [];

        $title  = $this->translate("label.delete");
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
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
        }

        $title  = $this->translate("label.duplicate");
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
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
        }

        $title  = $this->translate("label.edit");
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
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
        }

        $title  = $this->translate("label.show");
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
     * Render a percent.
     *
     * @param float|null $number The number.
     * @return string Returns the rendered percent.
     */
    protected function renderPercent(?float $number): ?string {

        $float = $this->renderFloat($number);
        if (null === $float) {
            return null;
        }

        return "$float %";
    }

    /**
     * Render a price.
     *
     * @param float|null $number The number.
     * @param string $currency The currency.
     * @return string|null Returns the rendered price.
     */
    protected function renderPrice(?float $number, string $currency = "€"): ?string {

        $float = $this->renderFloat($number);
        if (null === $float) {
            return null;
        }

        return "$float $currency";
    }

    /**
     * {@inheritdoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        if (false === DataTablesEntityHelper::isCompatible($entity)) {
            throw new InvalidArgumentException("The entity must implements DataTablesEntityInterface or declare a getId() method");
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
     * Translate.
     *
     * @param string $id The id.
     * @param array $parameters Teh parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    protected function translate(string $id, array $parameters = [], string $domain = null, string $locale = null): string {
        if (null === $domain) {
            $domain = TranslatorInterface::DOMAIN;
        }
        return null !== $this->getTranslator() ? $this->getTranslator()->trans($id, $parameters, $domain, $locale) : $id;
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
