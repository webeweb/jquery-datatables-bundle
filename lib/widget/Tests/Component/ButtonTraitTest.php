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

use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestButtonTrait;

/**
 * Button trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ButtonTraitTest extends AbstractTestCase {

    /**
     * Test setButton()
     *
     * @return void
     */
    public function testSetButton(): void {

        // Set a Button mock.
        $button = $this->getMockBuilder(ButtonInterface::class)->getMock();

        $obj = new TestButtonTrait();

        $obj->setButton($button);
        $this->assertSame($button, $obj->getButton());
    }
}
