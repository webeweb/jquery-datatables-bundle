<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Twig\Environment;
use WBW\Bundle\CoreBundle\Model\Attribute\StringEnvironmentTrait;
use WBW\Bundle\CoreBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtensionTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;

/**
 * Abstract DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractDataTablesTwigExtension extends AbstractTwigExtension {

    use RendererTwigExtensionTrait;
    use StringEnvironmentTrait;

    /**
     * Constructor.
     *
     * @param Environment $twigEnvironment The Twig environment.
     * @param RendererTwigExtension $rendererTwigExtension The renderer Twig extension.
     * @param string $environment The environment
     */
    public function __construct(Environment $twigEnvironment, RendererTwigExtension $rendererTwigExtension, string $environment) {
        parent::__construct($twigEnvironment);

        $this->setEnvironment($environment);
        $this->setRendererTwigExtension($rendererTwigExtension);
    }

    /**
     * Encode the options.
     *
     * @param array $options The options.
     * @return string Returns the encoded options.
     */
    protected function encodeOptions(array $options): string {

        if (0 === count($options)) {
            return "{}";
        }

        ksort($options);

        $flags = "prod" === $this->getEnvironment() ? 0 : JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;
        $json  = json_encode($options, $flags);

        return str_replace("\n", "\n        ", $json);
    }

    /**
     * Displays a jQuery DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string|null $selector The selector.
     * @param string|null $language The language.
     * @return string Returns the jQuery DataTables.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jQueryDataTables(DataTablesWrapperInterface $dtWrapper, ?string $selector, ?string $language): string {

        $options = DataTablesWrapperHelper::getOptions($dtWrapper);

        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageUrl($language)];
        }

        $var = DataTablesWrapperHelper::getName($dtWrapper);

        $searches = ["%var%", "%selector%", "%options%"];
        $replaces = [$var, null === $selector ? "#" . $var : $selector, $this->encodeOptions($options)];
        $template = file_get_contents(__DIR__ . "/AbstractDataTablesTwigExtension.jQueryDataTables.js.txt");

        $javascript = str_replace($searches, $replaces, $template);

        return $this->getRendererTwigExtension()->coreScriptFilter($javascript);
    }

    /**
     * Displays a jQuery DataTables "standalone".
     *
     * @param string $selector The selector.
     * @param string|null $language The language.
     * @param array $options The options.
     * @return string Returns the jQuery DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jQueryDataTablesStandalone(string $selector, ?string $language, array $options): string {

        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageUrl($language)];
        }

        $searches = ["%selector%", "%options%"];
        $replaces = [$selector, $this->encodeOptions($options)];
        $template = file_get_contents(__DIR__ . "/AbstractDataTablesTwigExtension.jQueryDataTablesStandalone.js.txt");

        $javascript = str_replace($searches, $replaces, $template);

        return $this->getRendererTwigExtension()->coreScriptFilter($javascript);
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string|null $class The class.
     * @param bool $includeTHead Include thead ?
     * @param bool $includeTFoot Include tfoot ?
     * @return string Returns the rendered DataTables.
     */
    protected function renderDataTables(DataTablesWrapperInterface $dtWrapper, ?string $class, bool $includeTHead, bool $includeTFoot): string {

        $attributes = [
            "class" => ["table", $class],
            "id"    => DataTablesWrapperHelper::getName($dtWrapper),
        ];

        $thead = true === $includeTHead ? $this->renderDataTablesRow($dtWrapper, "thead") . "\n" : "";
        $tfoot = true === $includeTFoot ? $this->renderDataTablesRow($dtWrapper, "tfoot") . "\n" : "";

        $inner = "\n" . $thead . $tfoot;

        return static::coreHTMLElement("table", $inner, $attributes);
    }

    /**
     * Render a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param bool $rowScope Row scope ?
     * @return string Returns the rendered column.
     */
    private function renderDataTablesColumn(DataTablesColumnInterface $dtColumn, bool $rowScope = false): string {

        $attributes = [
            "scope" => true === $rowScope ? "row" : null,
            "class" => $dtColumn->getClassname(),
            "width" => $dtColumn->getWidth(),
        ];

        return static::coreHTMLElement("th", $dtColumn->getTitle(), $attributes);
    }

    /**
     * Render a row.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string $wrapper The wrapper (thead or tfoot)
     * @return string Returns the rendered row.
     */
    private function renderDataTablesRow(DataTablesWrapperInterface $dtWrapper, string $wrapper): string {

        $row = "";

        $count = count($dtWrapper->getColumns());
        for ($i = 0; $i < $count; ++$i) {

            $dtColumn = array_values($dtWrapper->getColumns())[$i];

            $col = $this->renderDataTablesColumn($dtColumn, ("thead" === $wrapper && 0 === $i));
            $row .= $col . "\n";
        }

        $tr = static::coreHTMLElement("tr", "\n" . $row);

        return static::coreHTMLElement($wrapper, "\n" . $tr . "\n");
    }
}
