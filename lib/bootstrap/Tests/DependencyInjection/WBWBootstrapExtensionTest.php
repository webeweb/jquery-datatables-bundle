<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Throwable;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\DependencyInjection\Configuration;
use WBW\Bundle\BootstrapBundle\DependencyInjection\WBWBootstrapExtension;
use WBW\Bundle\BootstrapBundle\Provider\ColorProvider;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\AlertTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ProgressBarTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\CodeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\TypographyTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\FontAwesomeTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\IconTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MaterialDesignIconicFontTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtension;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Layout\GridTwigExtension;

/**
 * Bootstrap extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\DependencyInjection
 */
class WBWBootstrapExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array<string,mixed>|null
     */
    private $configs;

    /**
     * Container builder.
     *
     * @var ContainerBuilder|null
     */
    private $containerBuilder;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            WBWBootstrapExtension::EXTENSION_ALIAS => [],
        ];

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Container builder mock.
        $this->containerBuilder = new ContainerBuilder();
        $this->containerBuilder->set("twig", $twigEnvironment);
    }

    /**
     * Test getAlias()
     *
     * @return void
     */
    public function testGetAlias(): void {

        $obj = new WBWBootstrapExtension();

        $this->assertEquals(WBWBootstrapExtension::EXTENSION_ALIAS, $obj->getAlias());
    }

    /**
     * Test getConfiguration()
     *
     * @return void
     */
    public function testGetConfiguration(): void {

        $obj = new WBWBootstrapExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWBootstrapExtension();

        $obj->load($this->configs, $this->containerBuilder);

        // Providers
        $this->assertInstanceOf(ColorProvider::class, $this->containerBuilder->get(ColorProvider::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(AssetsTwigExtension::class, $this->containerBuilder->get(AssetsTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(AlertTwigExtension::class, $this->containerBuilder->get(AlertTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(BadgeTwigExtension::class, $this->containerBuilder->get(BadgeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ButtonTwigExtension::class, $this->containerBuilder->get(ButtonTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(LabelTwigExtension::class, $this->containerBuilder->get(LabelTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ProgressBarTwigExtension::class, $this->containerBuilder->get(ProgressBarTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(CodeTwigExtension::class, $this->containerBuilder->get(CodeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(TypographyTwigExtension::class, $this->containerBuilder->get(TypographyTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(FontAwesomeTwigExtension::class, $this->containerBuilder->get(FontAwesomeTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(GlyphiconTwigExtension::class, $this->containerBuilder->get(GlyphiconTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(IconTwigExtension::class, $this->containerBuilder->get(IconTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(MaterialDesignIconicFontTwigExtension::class, $this->containerBuilder->get(MaterialDesignIconicFontTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(MeteoconsTwigExtension::class, $this->containerBuilder->get(MeteoconsTwigExtension::SERVICE_NAME));

        $this->assertInstanceOf(GridTwigExtension::class, $this->containerBuilder->get(GridTwigExtension::SERVICE_NAME));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_bootstrap", WBWBootstrapExtension::EXTENSION_ALIAS);
    }
}
