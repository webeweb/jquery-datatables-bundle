<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
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
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesEntityHelper;

/**
 * DataTables buttons renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
 * @internal
 */
trait DataTablesButtonsRendererTrait {

    /**
     * Get the button Twig extension.
     *
     * @return ButtonTwigExtension|null Returns the button Twig extension.
     */
    abstract public function getButtonTwigExtension(): ?ButtonTwigExtension;

    /**
     * Get the provider name.
     *
     * @return string Returns the provider name.
     */
    abstract public function getName(): string;

    /**
     * Get the router.
     *
     * @return RouterInterface|null Returns the router.
     */
    abstract public function getRouter(): ?RouterInterface;

    /**
     * Render an action button "delete".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "delete".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonDelete($entity, string $route): string {

        DataTablesEntityHelper::isCompatible($entity, true);

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
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonDuplicate($entity, string $route): string {

        DataTablesEntityHelper::isCompatible($entity, true);

        $title  = $this->translate("label.duplicate");
        $button = $this->getButtonTwigExtension()->bootstrapButtonPrimaryFunction(["icon" => "fa:copy", "title" => $title, "size" => "xs"]);
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
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonEdit($entity, string $route): string {

        DataTablesEntityHelper::isCompatible($entity, true);

        $title  = $this->translate("label.edit");
        $button = $this->getButtonTwigExtension()->bootstrapButtonDefaultFunction(["icon" => "fa:pen", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Render an action button "new".
     *
     * @param object|null $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "new".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonNew($entity, string $route): string {

        $parameters = [];
        if (null !== $entity && DataTablesEntityHelper::isCompatible($entity, true)) {
            $parameters = ["id" => $entity->getId()];
        }

        $title  = $this->translate("label.new");
        $button = $this->getButtonTwigExtension()->bootstrapButtonPrimaryFunction(["icon" => "fa:plus", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, $parameters);

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
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonShow($entity, string $route): string {

        DataTablesEntityHelper::isCompatible($entity, true);

        $title  = $this->translate("label.show");
        $button = $this->getButtonTwigExtension()->bootstrapButtonInfoFunction(["icon" => "fa:eye", "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Render an action button "switch".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @param bool|null $enabled Enabled ?
     * @return string Returns the action button "switch".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonSwitch($entity, string $route, ?bool $enabled): string {

        DataTablesEntityHelper::isCompatible($entity, true);

        $type = sprintf("bootstrapButton%sFunction", true === $enabled ? "Success" : "Danger");
        $icon = true === $enabled ? "fa:toggle-on" : "fa:toggle-off";

        $title  = $this->translate(true === $enabled ? "label.disable" : "label.enable");
        $button = $this->getButtonTwigExtension()->$type(["icon" => $icon, "title" => $title, "size" => "xs"]);
        $url    = $this->getRouter()->generate($route, ["id" => $entity->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $url);
    }

    /**
     * Translate.
     *
     * @param string|null $id The id.
     * @param array $parameters Teh parameters.
     * @param string|null $domain The domain.
     * @param string|null $locale The locale.
     * @return string Returns the translated id in case of success, id otherwise.
     */
    abstract protected function translate(?string $id, array $parameters = [], string $domain = null, string $locale = null): string;
}
