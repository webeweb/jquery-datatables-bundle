<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Button;

use WBW\Bundle\BootstrapBundle\Component\Button\PrimaryButton;
use WBW\Bundle\BootstrapBundle\Component\ButtonInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Primary button test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Button
 */
class PrimaryButtonTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new PrimaryButton();

        $this->assertEquals(ButtonInterface::BUTTON_TYPE_PRIMARY, $obj->getType());
    }
}
