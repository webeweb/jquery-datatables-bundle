<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Twig\Extension;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Twig\Environment;
use WBW\Bundle\CoreBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\CoreBundle\Twig\Extension\AssetsTwigExtensionTrait;
use WBW\Bundle\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Library\Traits\Strings\StringEnvironmentTrait;

/**
 * Abstract DataTables Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractDataTablesTwigExtension extends AbstractTwigExtension {

    use AssetsTwigExtensionTrait;
    use StringEnvironmentTrait;

    /**
     * Constructor.
     *
     * @param Environment $twigEnvironment The Twig environment.
     * @param AssetsTwigExtension $assetsTwigExtension The assets Twig extension.
     * @param string $environment The environment
     */
    public function __construct(Environment $twigEnvironment, AssetsTwigExtension $assetsTwigExtension, string $environment) {
        parent::__construct($twigEnvironment);

        $this->setEnvironment($environment);
        $this->setAssetsTwigExtension($assetsTwigExtension);
    }

    /**
     * Encode the options.
     *
     * @param array<string,mixed> $options The options.
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
     * Render a HTML DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string|null $class The class.
     * @param bool $includeTHead Include thead ?
     * @param bool $includeTFoot Include tfoot ?
     * @return string Returns the rendered HTML DataTables.
     */
    protected function hDataTables(DataTablesWrapperInterface $dtWrapper, ?string $class, bool $includeTHead, bool $includeTFoot): string {

        $attributes = [
            "class" => ["table", $class],
            "id"    => DataTablesWrapperHelper::getName($dtWrapper),
        ];

        $thead = true === $includeTHead ? $this->hDataTablesRow($dtWrapper, "thead") . "\n" : "";
        $tfoot = true === $includeTFoot ? $this->hDataTablesRow($dtWrapper, "tfoot") . "\n" : "";

        $inner = "\n" . $thead . $tfoot;

        return static::coreHtmlElement("table", $inner, $attributes);
    }

    /**
     * Render a HTML DataTables column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param bool $rowScope Row scope ?
     * @return string Returns the rendered HTML DataTables column.
     */
    private function hDataTablesColumn(DataTablesColumnInterface $dtColumn, bool $rowScope = false): string {

        $attributes = [
            "scope" => true === $rowScope ? "row" : null,
            "class" => $dtColumn->getClassname(),
            "width" => $dtColumn->getWidth(),
        ];

        return static::coreHtmlElement("th", $dtColumn->getTitle(), $attributes);
    }

    /**
     * Render a HTML DataTables row.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string $wrapper The wrapper (thead or tfoot)
     * @return string Returns the rendered HTML DataTables row.
     */
    private function hDataTablesRow(DataTablesWrapperInterface $dtWrapper, string $wrapper): string {

        $row = "";

        $count = count($dtWrapper->getColumns());
        for ($i = 0; $i < $count; ++$i) {

            $dtColumn = array_values($dtWrapper->getColumns())[$i];

            $col = $this->hDataTablesColumn($dtColumn, ("thead" === $wrapper && 0 === $i));
            $row .= $col . "\n";
        }

        $tr = static::coreHtmlElement("tr", "\n" . $row);

        return static::coreHtmlElement($wrapper, "\n" . $tr . "\n");
    }

    /**
     * Display a javascript DataTables.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @param string|null $selector The selector.
     * @param string|null $language The language.
     * @return string Returns the javascript DataTables.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jDataTables(DataTablesWrapperInterface $dtWrapper, ?string $selector, ?string $language): string {

        $options = DataTablesWrapperHelper::getOptions($dtWrapper);

        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageUrl($language)];
        }

        $var = DataTablesWrapperHelper::getName($dtWrapper);

        $searches = ["%var%", "%selector%", "%options%"];
        $replaces = [$var, null === $selector ? "#" . $var : $selector, $this->encodeOptions($options)];
        $template = file_get_contents(__DIR__ . "/AbstractDataTablesTwigExtension.jDataTables.js.txt");

        $javascript = str_replace($searches, $replaces, $template);

        return $this->getAssetsTwigExtension()->coreScriptFilter($javascript);
    }

    /**
     * Display a javascript DataTables "standalone".
     *
     * @param string $selector The selector.
     * @param string|null $language The language.
     * @param array<string,mixed> $options The options.
     * @return string Returns the javascript DataTables "Standalone".
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    protected function jDataTablesStandalone(string $selector, ?string $language, array $options): string {

        if (null !== $language) {
            $options["language"] = ["url" => DataTablesWrapperHelper::getLanguageUrl($language)];
        }

        $searches = ["%selector%", "%options%"];
        $replaces = [$selector, $this->encodeOptions($options)];
        $template = file_get_contents(__DIR__ . "/AbstractDataTablesTwigExtension.jDataTablesStandalone.js.txt");

        $javascript = str_replace($searches, $replaces, $template);

        return $this->getAssetsTwigExtension()->coreScriptFilter($javascript);
    }
}
