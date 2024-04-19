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

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Alert;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Component\Alert\LightAlert;
use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Light alert test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Alert
 */
class LightAlertTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new LightAlert();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(AlertInterface::class, $obj);

        $this->assertEquals(AlertInterface::ALERT_TYPE_LIGHT, $obj->getType());
    }
}
