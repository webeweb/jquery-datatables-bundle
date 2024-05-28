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

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\BadgeInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;

/**
 * Badge interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class BadgeInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_DARK, BadgeInterface::BADGE_TYPE_DARK);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_LIGHT, BadgeInterface::BADGE_TYPE_LIGHT);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY, BadgeInterface::BADGE_TYPE_PRIMARY);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_SECONDARY, BadgeInterface::BADGE_TYPE_SECONDARY);
    }
}
