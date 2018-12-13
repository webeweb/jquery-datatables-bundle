<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

use Twig_Environment;
use WBW\Bundle\CoreBundle\Service\TwigEnvironmentTrait;
use WBW\Bundle\CoreBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\RendererTwigExtensionTrait;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Core\Argument\StringHelper;
use WBW\Library\Core\Exception\IO\FileNotFoundException;

/**
 * Abstract DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractDataTablesTwigExtension extends AbstractTwigExtension {

    use RendererTwigExtensionTrait;
    use TwigEnvironmentTrait;

    /**
     * jQuery DataTables.
     *
     * @var string
     */
    const JQUERY_DATATABLES = <<<'EOT'
    $(document).ready(function () {
        var %var% = $("%selector%").DataTable(%options%);
    });
EOT;

    /**
     * jQuery DataTables.
     *
     * @var string
     */
    const JQUERY_DATATABLES_STANDALONE = <<<'EOT'
    $(document).ready(function () {
        $("%selector%").DataTable(%options%);
    });
EOT;

    /**
     * Constructor.
     *
     * @param Twig_Environment $twigEnvironment The Twig environment.
     * @param RendererTwigExtension $rendererTwigExtension The renderer Twig extension.
     */
    protected function __construct(Twig_Environment $twigEnvironment, RendererTwigExtension $rendererTwigExtension) {
        parent::__construct($twigEnvironment);
        $this->setRendererTwigExtension($rendererTwigExtension);
    }

    /**
     * Encode the options.
     *
     * @param array $options The options.
     * @return string Returns the encoded options.
     */
    protected function encodeOptions(array $options) {
        if (0 === count($options)) {
            return "{}";
        }
        ksort($options);
        $output = json_encode($options, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return str_replace("\n", "\n        ", $output);
    }

    /**
     * Displays a jQuery DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string $selector The selector.
     * @param string $language The language.
     * @return string Returns the jQuery DataTables.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jQueryDataTables(DataTablesWrapperInterface $dtWrapper, $selector, $language) {

        // Get the options.
        $dtOptions = DataTablesWrapperHelper::getOptions($dtWrapper);

        // Initialize the parameters.
        $var     = DataTablesWrapperHelper::getName($dtWrapper);
        $options = $dtOptions;
        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageURL($language)];
        }

        //
        $searches = ["%var%", "%selector%", "%options%"];
        $replaces = [$var, null === $selector ? "#" . $var : $selector, $this->encodeOptions($options)];

        // Return the Javascript.
        $javascript = StringHelper::replace(self::JQUERY_DATATABLES, $searches, $replaces);
        return $this->getRendererTwigExtension()->coreScriptFilter($javascript);
    }

    /**
     * Displays a jQuery DataTables "Standalone".
     *
     * @param string $selector The selector.
     * @param string $language The language.
     * @param array $options The options.
     * @return string Returns the jQuery DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jQueryDataTablesStandalone($selector, $language, array $options) {

        // Initialize the language.
        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageURL($language)];
        }

        //
        $searches = ["%selector%", "%options%"];
        $replaces = [$selector, $this->encodeOptions($options)];

        // Return the Javascript.
        $javascript = StringHelper::replace(self::JQUERY_DATATABLES_STANDALONE, $searches, $replaces);
        return $this->getRendererTwigExtension()->coreScriptFilter($javascript);
    }

    /**
     * Render a DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string $class The class.
     * @param boolean $includeTHead Include thead ?.
     * @param boolean $includeTFoot Include tfoot ?
     * @returns string Returns the rendered DataTables.
     */
    protected function renderDataTables(DataTablesWrapperInterface $dtWrapper, $class, $includeTHead, $includeTFoot) {

        // Initialize the template.
        $template = "<table %attributes%>\n%innerHTML%</table>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["class"] = ["table", $class];
        $attributes["id"]    = DataTablesWrapperHelper::getName($dtWrapper);

        // Initialize the parameters.
        $thead = true === $includeTHead ? $this->renderDataTablesTHead($dtWrapper) : "";
        $tfoot = true === $includeTFoot ? $this->renderDataTablesTFoot($dtWrapper) : "";

        // Return the HTML.
        return StringHelper::replace($template, ["%attributes%", "%innerHTML%"], [StringHelper::parseArray($attributes), $thead . $tfoot]);
    }

    /**
     * Render a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @return string Returns the rendered column.
     */
    private function renderDataTablesColumn(DataTablesColumnInterface $dtColumn, $scopeRow = false) {

        // Initialize the template.
        $template = "            <th%attributes%>%innerHTML%</th>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["scope"] = true === $scopeRow ? "row" : null;
        $attributes["class"] = $dtColumn->getClassname();
        $attributes["width"] = $dtColumn->getWidth();

        // Initialize the parameters.
        $innerHTML = $dtColumn->getTitle();

        // Return the HTML.
        return StringHelper::replace($template, ["%attributes%", "%innerHTML%"], [preg_replace("/^\ $/", "", " " . StringHelper::parseArray($attributes)), $innerHTML]);
    }

    /**
     * Render a footer.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the rendered footer.
     */
    private function renderDataTablesTFoot(DataTablesWrapperInterface $dtWrapper) {

        // Initialize the template.
        $template = "    <tfoot>\n        <tr>\n%innerHTML%        </tr>\n    </tfoot>\n";

        // Initialize the parameters.
        $innerHTML = "";
        foreach ($dtWrapper->getColumns() as $dtColumn) {
            $column = $this->renderDataTablesColumn($dtColumn);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringHelper::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

    /**
     * Render a header.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the rendered header.
     */
    private function renderDataTablesTHead(DataTablesWrapperInterface $dtWrapper) {

        // Initialize the templates.
        $template = "    <thead>\n        <tr>\n%innerHTML%        </tr>\n    </thead>\n";

        // Count the columns.
        $count = count($dtWrapper->getColumns());

        // Initialize the parameters.
        $innerHTML = "";
        for ($i = 0; $i < $count; ++$i) {
            $dtColumn = array_values($dtWrapper->getColumns())[$i];
            $column   = $this->renderDataTablesColumn($dtColumn, 0 === $i);
            if ("" === $column) {
                continue;
            }
            $innerHTML .= $column . "\n";
        }

        // Return the HTML.
        return "" === $innerHTML ? "" : StringHelper::replace($template, ["%innerHTML%"], [$innerHTML]);
    }

}
