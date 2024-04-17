<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Renderer\Component;

use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Factory\Component\BadgeFactory;
use WBW\Bundle\BootstrapBundle\Renderer\Component\BadgeRenderer;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Badge renderer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Renderer\Component
 */
class BadgeRendererTest extends AbstractTestCase {

    /**
     * Badge.
     *
     * @var BadgeInterface|null
     */
    private $badge;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set a Badge mock.
        $this->badge = BadgeFactory::parseDangerBadge([
            "content" => "content",
            "pill"    => true,
            "class"   => "class",
        ]);
    }

    /**
     * Test renderContent()
     *
     * @return void
     */
    public function testRenderContent(): void {

        $res = BadgeRenderer::renderContent($this->badge);
        $this->assertEquals("content", $res);
    }

    /**
     * Test renderPill()
     *
     * @return void
     */
    public function testRenderPill(): void {

        $res = BadgeRenderer::renderPill($this->badge);
        $this->assertEquals("badge-pill", $res);
    }

    /**
     * Test renderType()
     *
     * @return void
     */
    public function testRenderType(): void {

        $res = BadgeRenderer::renderType($this->badge);
        $this->assertEquals("badge-danger", $res);
    }
}
