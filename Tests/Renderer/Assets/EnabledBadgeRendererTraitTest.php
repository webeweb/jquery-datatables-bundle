<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Assets;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets\TestEnabledBadgeRendererTrait;

/**
 * Enabled badge renderer trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Renderer\Assets
 */
class EnabledBadgeRendererTraitTest extends AbstractTestCase {

    /**
     * Badge Twig extension.
     *
     * @var BadgeTwigExtension
     */
    private $badgeTwigExtension;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Badge Twig extension mock.
        $this->badgeTwigExtension = new BadgeTwigExtension($this->twigEnvironment);
    }

    /**
     * Test renderEnabledBadge()
     *
     * @return void
     */
    public function testRenderEnabledBadge(): void {

        $obj = new TestEnabledBadgeRendererTrait();

        $this->assertNull($obj->renderEnabledBadge(true));

        $obj->setBadgeTwigExtension($this->badgeTwigExtension);
        $this->assertNull($obj->renderEnabledBadge(true));

        $obj->setTranslator($this->translator);
        $this->assertNotNull($obj->renderEnabledBadge(true));
    }

    /**
     * Test renderEnabledBadge()
     *
     * @return void
     */
    public function testRenderEnabledBadgeWithFalse(): void {

        $obj = new TestEnabledBadgeRendererTrait();
        $obj->setBadgeTwigExtension($this->badgeTwigExtension);
        $obj->setTranslator($this->translator);

        $res = file_get_contents(__DIR__ . "/EnabledBadgeRendererTraitTest.testRenderEnabledBadgeWithFalse.html.txt");
        $this->assertEquals($res, $obj->renderEnabledBadge(false));
    }

    /**
     * Test renderEnabledBadge()
     *
     * @return void
     */
    public function testRenderEnabledBadgeWithTrue(): void {

        $obj = new TestEnabledBadgeRendererTrait();
        $obj->setBadgeTwigExtension($this->badgeTwigExtension);
        $obj->setTranslator($this->translator);

        $res = file_get_contents(__DIR__ . "/EnabledBadgeRendererTraitTest.testRenderEnabledBadgeWithTrue.html.txt");
        $this->assertEquals($res, $obj->renderEnabledBadge(true));
    }
}
