<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Renderer;

use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;
use WBW\Bundle\CommonBundle\Tests\DefaultTestCase;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\TestBootstrapBadgeRendererTrait;

/**
 * Bootstrap badge renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Renderer
 */
class BootstrapBadgeRendererTraitTest extends AbstractTestCase {

    /**
     * Bootstrap badge renderer.
     *
     * @var TestBootstrapBadgeRendererTrait|null
     */
    private $bootstrapBadgeRenderer;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $translator->expects($this->any())->method("trans")->willReturnCallback(DefaultTestCase::getTranslatorTransFunction());

        // Set a Badge Twig extension.
        $badgeTwigExtension = new BadgeTwigExtension($twigEnvironment);

        // Set a Bootstrap badge renderer.
        $this->bootstrapBadgeRenderer = new TestBootstrapBadgeRendererTrait();
        $this->bootstrapBadgeRenderer->setBadgeTwigExtension($badgeTwigExtension);
        $this->bootstrapBadgeRenderer->setTranslator($translator);
    }

    /**
     * Test renderBadgeEnabled()
     *
     * @return void
     */
    public function testRenderBadgeEnabled(): void {

        $bak = null;

        $obj = $this->bootstrapBadgeRenderer;

        $bak = $obj->getBadgeTwigExtension();
        $obj->setBadgeTwigExtension(null);
        $this->assertNull($obj->renderBadgeEnabled(true));

        $obj->setBadgeTwigExtension($bak);
        $obj->setTranslator(null);
        $this->assertNull($obj->renderBadgeEnabled(true));
    }

    /**
     * Test renderBadgeEnabled()
     *
     * @return void
     */
    public function testRenderBadgeEnabledWithFalse(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer/BootstrapBadgeRendererTraitTest.testRenderBadgeEnabledWithFalse.html.txt");

        $obj = $this->bootstrapBadgeRenderer;

        $this->assertEquals($exp, $obj->renderBadgeEnabled(false));
    }

    /**
     * Test renderBadgeEnabled()
     *
     * @return void
     */
    public function testRenderBadgeEnabledWithTrue(): void {

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Renderer//BootstrapBadgeRendererTraitTest.testRenderBadgeEnabledWithTrue.html.txt");

        $obj = $this->bootstrapBadgeRenderer;

        $this->assertEquals($exp, $obj->renderBadgeEnabled(true));
    }
}
