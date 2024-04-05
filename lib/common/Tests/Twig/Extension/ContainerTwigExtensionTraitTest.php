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

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Environment;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension\TestContainerTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Twig\Extension\ContainerTwigExtension;

/**
 * Container Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
 */
class ContainerTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setContainerTwigExtension()
     *
     * @return void
     */
    public function testSetContainerTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Container mock.
        $container = $this->getMockBuilder(ContainerInterface::class)->getMock();

        // Set a Container Twig extension mock.
        $containerTwigExtension = new ContainerTwigExtension($twigEnvironment, $container);

        $obj = new TestContainerTwigExtensionTrait();

        $obj->setContainerTwigExtension($containerTwigExtension);
        $this->assertSame($containerTwigExtension, $obj->getContainerTwigExtension());
    }
}
