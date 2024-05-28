<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestBadgeTrait;

/**
 * Badge trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class BadgeTraitTest extends AbstractTestCase {

    /**
     * Test setBadge()
     *
     * @return void
     */
    public function testSetBadge(): void {

        // Set a Badge mock.
        $badge = $this->getMockBuilder(BadgeInterface::class)->getMock();

        $obj = new TestBadgeTrait();

        $obj->setBadge($badge);
        $this->assertSame($badge, $obj->getBadge());
    }
}
