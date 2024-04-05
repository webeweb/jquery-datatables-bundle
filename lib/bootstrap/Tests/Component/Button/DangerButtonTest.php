<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Component\Button;

use WBW\Bundle\BootstrapBundle\Component\Button\DangerButton;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Symfony\Assets\ButtonInterface as BaseButtonInterface;

/**
 * Danger button test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Component\Button
 */
class DangerButtonTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DangerButton();

        $this->assertEquals(BaseButtonInterface::BUTTON_TYPE_DANGER, $obj->getType());
    }
}
