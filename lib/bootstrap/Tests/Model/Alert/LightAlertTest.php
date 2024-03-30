<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Model\Alert;

use WBW\Bundle\BootstrapBundle\Model\Alert\LightAlert;
use WBW\Bundle\BootstrapBundle\Model\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Light alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Model\Alert
 */
class LightAlertTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new LightAlert();

        $this->assertEquals(AlertInterface::ALERT_TYPE_LIGHT, $obj->getType());
    }
}
