<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\BadgeInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestBadgeTrait;

/**
 * Badge trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
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
