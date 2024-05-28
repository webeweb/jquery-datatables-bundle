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

use WBW\Bundle\BootstrapBundle\Component\AlertInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Component\TestAlertTrait;

/**
 * Alert trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component
 */
class AlertTraitTest extends AbstractTestCase {

    /**
     * Test setAlert()
     *
     * @return void
     */
    public function testSetAlert(): void {

        // Set an Alert mock.
        $alert = $this->getMockBuilder(AlertInterface::class)->getMock();

        $obj = new TestAlertTrait();

        $obj->setAlert($alert);
        $this->assertSame($alert, $obj->getAlert());
    }
}
