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
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\CSS\ButtonTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Renderer\DateTimeRenderer;
use WBW\Bundle\CoreBundle\Service\RouterTrait;
use WBW\Bundle\CoreBundle\Service\TranslatorTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;

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
     * {@inheritdoc}
     */
    public function getMethod() {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions() {

        // Initialize the options.
        $dtOptions = DataTablesFactory::newOptions();
        $dtOptions->addOption("responsive", true);
        $dtOptions->addOption("searchDelay", 1000);

        // Return the options.
        return $dtOptions;
    }

    /**
     * Render the DataTables buttons.
     *
     * @param mixed $entity The entity.
     * @param string $editRoute The edit route.
     * @param string $deleteRoute The delete route.
     * @param bool $enableDelete Enable delete ?
     * @return string Returns the DataTables buttons.
     */
    protected function renderButtons($entity, $editRoute, $deleteRoute = null, $enableDelete = true) {

        // Initialize the translations.
        $titles   = [];
        $titles[] = $this->getTranslator()->trans("label.edit", [], "CoreBundle");
        $titles[] = $this->getTranslator()->trans("label.delete", [], "CoreBundle");

        // Initialize the actions.
        $actions   = [];
        $actions[] = $this->getButtonTwigExtension()->bootstrapButtonDefaultFunction(["icon" => "pencil", "title" => $titles[0], "size" => "xs"]);
        $actions[] = $this->getButtonTwigExtension()->bootstrapButtonDangerFunction(["icon" => "trash", "title" => $titles[1], "size" => "xs"]);

        // Initialize the routes.
        $routes   = [];
        $routes[] = $this->getRouter()->generate($editRoute, ["id" => $entity->getId()]);
        $routes[] = $this->getRouter()->generate("jquery_datatables_delete", ["name" => $this->getName(), "id" => $entity->getId()]);

        // Check the delete route and use it if provided.
        if (null !== $deleteRoute) {
            $routes[1] = $this->getRouter()->generate($deleteRoute, ["id" => $entity->getId()]);
        }

        // Initialize the links.
        $links   = [];
        $links[] = $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($actions[0], $routes[0]);
        if (true === $enableDelete) {
            $links[] = $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($actions[1], $routes[1]);
        }

        // Return the row buttons.
        return implode(" ", $links);
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
}
