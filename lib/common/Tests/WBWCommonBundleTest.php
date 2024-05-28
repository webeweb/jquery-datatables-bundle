<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Throwable;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\CommonBundle\WBWCommonBundle;
use WBW\Library\Widget\Helper\AssetsHelper;

/**
 * Common bundle test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests
 */
class WBWCommonBundleTest extends AbstractTestCase {

    /**
     * Test assets
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testAssets(): void {

        // Load the YAML configuration.
        $assets  = WBWCommonExtension::loadYamlConfig(__DIR__ . "/../Resources/config", "assets");
        $plugins = $assets["assets"]["wbw.common.assets"]["plugins"];

        $res = AssetsHelper::listAssets(__DIR__ . "/../Resources/assets");
        $this->assertCount(22, $res);

        $i = -1;

        $this->assertRegExp("/animate\.css-" . preg_quote($plugins["animate_css"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/chart.js-" . preg_quote($plugins["chart_js"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/clippy\.js\.zip$/", $res[++$i]);
        $this->assertRegExp("/fullcalendar-" . preg_quote($plugins["full_calendar"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-" . preg_quote($plugins["jquery"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-contextmenu-" . preg_quote($plugins["jquery_context_menu"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-easyautocomplete-" . preg_quote($plugins["jquery_easy_autocomplete"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-fancybox-" . preg_quote($plugins["jquery_fancy_box"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-inputmask-" . preg_quote($plugins["jquery_input_mask"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/jquery-select2-" . preg_quote($plugins["jquery_select2"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/leaflet-" . preg_quote($plugins["leaflet"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/leaflet-color-markers-" . preg_quote($plugins["leaflet_color_markers"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/leaflet-markercluster-" . preg_quote($plugins["leaflet_marker_cluster"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/lightgallery-" . preg_quote($plugins["light_gallery"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/material-design-color-palette-" . preg_quote($plugins["material_design_color_palette"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/material-design-hierarchical-display-" . preg_quote($plugins["material_design_hierarchical_display"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/simplemde-markdown-editor-" . preg_quote($plugins["simplemde_markdown_editor"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/sweetalert-" . preg_quote($plugins["sweet_alert"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/sweetalert2-" . preg_quote($plugins["sweet_alert2"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/syntaxhighlighter-" . preg_quote($plugins["syntax_highlighter"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/typed\.js-" . preg_quote($plugins["typed_js"]["version"]) . "\.zip$/", $res[++$i]);
        $this->assertRegExp("/waitme-" . preg_quote($plugins["wait_me"]["version"]) . "\.zip$/", $res[++$i]);
    }

    /**
     * Test build()
     *
     * @return void
     */
    public function testBuild(): void {

        // Set a Container builder mock.
        $containerBuilder = new ContainerBuilder();

        $obj = new WBWCommonBundle();

        $obj->build($containerBuilder);
        $this->assertNull(null);
    }

    /**
     * Test getAssetsRelativeDirectory()
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory(): void {

        $obj = new WBWCommonBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Test getContainerExtension()
     *
     * @return void
     */
    public function testGetContainerExtension(): void {

        $obj = new WBWCommonBundle();

        $this->assertInstanceOf(WBWCommonExtension::class, $obj->getContainerExtension());
    }

    /**
     * Test getTranslationDomain()
     *
     * @return void
     */
    public function testGetTranslationDomain(): void {

        $this->assertEquals(WBWCommonBundle::TRANSLATION_DOMAIN, WBWCommonBundle::getTranslationDomain());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("WBWCommonBundle", WBWCommonBundle::TRANSLATION_DOMAIN);

        $obj = new WBWCommonBundle();

        $this->assertInstanceOf(AssetsProviderInterface::class, $obj);
    }
}
