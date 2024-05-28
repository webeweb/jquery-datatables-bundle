<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider;

use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestLayoutProviderTrait;

/**
 * Layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class LayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a Layout provider mock.
        $layoutProvider = $this->getMockBuilder(LayoutProviderInterface::class)->getMock();

        $obj = new TestLayoutProviderTrait();

        $obj->setLayoutProvider($layoutProvider);
        $this->assertSame($layoutProvider, $obj->getLayoutProvider());
    }
}
