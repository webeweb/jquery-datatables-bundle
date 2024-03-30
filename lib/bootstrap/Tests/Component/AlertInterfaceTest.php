<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component;

use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\WBWBootstrapBundle;

/**
 * Alert interface test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class AlertInterfaceTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_DARK, AlertInterface::ALERT_TYPE_DARK);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_LIGHT, AlertInterface::ALERT_TYPE_LIGHT);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_PRIMARY, AlertInterface::ALERT_TYPE_PRIMARY);
        $this->assertEquals(WBWBootstrapBundle::BOOTSTRAP_TYPE_SECONDARY, AlertInterface::ALERT_TYPE_SECONDARY);
    }
}
