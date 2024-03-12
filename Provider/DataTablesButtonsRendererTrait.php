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
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle;
use WBW\Library\Types\Helper\ArrayHelper;

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
     * Render an action button.
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @param array<string,mixed> $options The options.
     * @return string Returns the action button.
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     * @internal
     */
    private function renderActionButton($entity, string $route, array $options): string {

        DataTablesEntityHelper::isCompatible($entity, true);

        $_label  = ArrayHelper::get($options, "label");
        $_domain = ArrayHelper::get($options, "translation_domain");
        $_icon   = ArrayHelper::get($options, "icon");
        $_params = ArrayHelper::get($options, "route", []);
        $_target = ArrayHelper::get($options, "target");

        $method = sprintf("bootstrapButton%sFunction", ArrayHelper::get($options, "type", "Default"));

        $title  = $this->translate($_label, [], $_domain);
        $button = $this->getButtonTwigExtension()->$method(["icon" => $_icon, "title" => $title, "size" => "xs"]);
        $href   = $this->getRouter()->generate($route, array_merge($_params, ["id" => $entity->getId()]));

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $href, $_target);
    }

    /**
     * Render an action button "comment".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @param string|null $comment The comment.
     * @return string Returns the action button "comment".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonComment($entity, string $route, ?string $comment): string {

        return $this->renderActionButton($entity, $route, [
            "type"               => "Default",
            "icon"               => 0 < mb_strlen($comment) ? "fa:comment" : "fa:comment-slash",
            "label"              => "label.comment",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
        ]);
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
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonDelete($entity, string $route): string {

        $args = "wbw_jquery_datatables_delete" === $route ? ["name" => $this->getName()] : [];

        return $this->renderActionButton($entity, $route, [
            "type"               => "Danger",
            "icon"               => "fa:trash",
            "label"              => "label.delete",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
            "route"              => $args,
        ]);
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

        return $this->renderActionButton($entity, $route, [
            "type"               => "Primary",
            "icon"               => "fa:copy",
            "label"              => "label.duplicate",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
        ]);
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

        return $this->renderActionButton($entity, $route, [
            "type"               => "Default",
            "icon"               => "fa:pen",
            "label"              => "label.edit",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
        ]);
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

        $args = [];
        if (null !== $entity && DataTablesEntityHelper::isCompatible($entity, true)) {
            $args = ["id" => $entity->getId()];
        }

        $title  = $this->translate("label.new", [], WBWJQueryDataTablesBundle::getTranslationDomain());
        $button = $this->getButtonTwigExtension()->bootstrapButtonPrimaryFunction(["icon" => "fa:plus", "title" => $title, "size" => "xs"]);
        $href   = $this->getRouter()->generate($route, $args);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $href);
    }

    /**
     * Render an action button "PDF".
     *
     * @param object $entity The entity.
     * @param string $route The route.
     * @return string Returns the action button "PDF".
     * @throws InvalidArgumentException Throws an invalid argument exception if the entity is invalid.
     * @throws InvalidParameterException Throws an invalid parameter exception if a parameter is invalid.
     * @throws RouteNotFoundException Throws a route not found exception if the route doesn't exist.
     * @throws MissingMandatoryParametersException Throws a missing mandatory parameter exception if a mandatory parameter is missing.
     */
    protected function renderActionButtonPdf($entity, string $route): string {

        return $this->renderActionButton($entity, $route, [
            "type"               => "Danger",
            "icon"               => "fa:file-pdf",
            "label"              => "PDF",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
            "target"             => "_blank",
        ]);
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

        return $this->renderActionButton($entity, $route, [
            "type"               => "Info",
            "icon"               => "fa:eye",
            "label"              => "label.show",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
        ]);
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

        return $this->renderActionButton($entity, $route, [
            "type"               => true === $enabled ? "Success" : "Danger",
            "icon"               => true === $enabled ? "fa:toggle-on" : "fa:toggle-off",
            "label"              => true === $enabled ? "label.disable" : "label.enable",
            "translation_domain" => WBWJQueryDataTablesBundle::getTranslationDomain(),
        ]);
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
