<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Badge;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\Badge\DangerBadge;
use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\BadgeInterface as BaseBadgeInterface;

/**
 * Danger badge test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Badge
 */
class DangerBadgeTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerBadge();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(BadgeInterface::class, $obj);

        $this->assertEquals(BaseBadgeInterface::BADGE_TYPE_DANGER, $obj->getType());
    }
}
