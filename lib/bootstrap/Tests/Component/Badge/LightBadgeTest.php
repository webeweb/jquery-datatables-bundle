<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Badge;

use WBW\Bundle\BootstrapBundle\Component\Badge\LightBadge;
use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Light badge test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Badge
 */
class LightBadgeTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new LightBadge();

        $this->assertEquals(BadgeInterface::BADGE_TYPE_LIGHT, $obj->getType());
    }
}
