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

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;
use Twig\Environment;
use WBW\Bundle\CommonBundle\DependencyInjection\WBWCommonExtension;
use WBW\Bundle\CommonBundle\EventListener\NotificationEventListener;
use WBW\Bundle\CommonBundle\EventListener\ToastEventListener;
use WBW\Bundle\CommonBundle\Service\SessionService;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtension;
use WBW\Bundle\CommonBundle\Twig\Extension\ContainerTwigExtension;

/**
 * Common extension test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection
 */
class WBWCommonExtensionTest extends AbstractTestCase {

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
            WBWCommonExtension::EXTENSION_ALIAS => [],
        ];

        // Set a Router mock.
        $router = $this->getMockBuilder(RouterInterface::class)->getMock();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Parameter bag mock.
        $parameterBag = new ParameterBag([
            "kernel.environment" => "test",
            "kernel.project_dir" => realpath(__DIR__ . "/../../../../tests/Fixtures/app"),
        ]);

        // Set a Container builder mock.
        $this->containerBuilder = new ContainerBuilder($parameterBag);

        $this->containerBuilder->set("router", $router);
        $this->containerBuilder->set("twig", $twigEnvironment);
    }

    /**
     * Test load()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testLoad(): void {

        $obj = new WBWCommonExtension();

        $obj->load($this->configs, $this->containerBuilder);

        // Event listeners
        $this->assertInstanceOf(NotificationEventListener::class, $this->containerBuilder->get(NotificationEventListener::SERVICE_NAME));
        $this->assertInstanceOf(ToastEventListener::class, $this->containerBuilder->get(ToastEventListener::SERVICE_NAME));

        // Services
        $this->assertInstanceOf(SessionService::class, $this->containerBuilder->get(SessionService::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(AssetsTwigExtension::class, $this->containerBuilder->get(AssetsTwigExtension::SERVICE_NAME));
        $this->assertInstanceOf(ContainerTwigExtension::class, $this->containerBuilder->get(ContainerTwigExtension::SERVICE_NAME));
    }

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfig(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "config");
        $this->assertNotEquals([], $res);
    }

    /**
     * Test loadYamlConfig()
     *
     * @return void
     */
    public function testLoadYamlConfigWithoutFilename(): void {

        // Set a path mock.
        $path = realpath(__DIR__ . "/../Fixtures/Resources/config");

        $res = WBWCommonExtension::loadYamlConfig($path, "error");
        $this->assertEquals([], $res);
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw_common", WBWCommonExtension::EXTENSION_ALIAS);
    }
}
