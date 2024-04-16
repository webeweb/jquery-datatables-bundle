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

namespace WBW\Bundle\WidgetBundle\Tests\Label;

use WBW\Bundle\WidgetBundle\Label\LabelInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Label\TestLabelTrait;

/**
 * Label trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Label
 */
class LabelTraitTest extends AbstractTestCase {

    /**
     * Test setLabel()
     *
     * @return void
     */
    public function testSetLabel(): void {

        // Set a Label mock.
        $label = $this->getMockBuilder(LabelInterface::class)->getMock();

        $obj = new TestLabelTrait();

        $obj->setLabel($label);
        $this->assertSame($label, $obj->getLabel());
    }
}
