<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\NavigationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestNavigationLayoutProviderTrait;

/**
 * Navigation layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class NavigationLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setNavigationLayoutProvider()
     *
     * @return void
     */
    public function testSetNavigationLayoutProvider(): void {

        // Set a Navigation layout provider mock.
        $navigationLayoutProvider = $this->getMockBuilder(NavigationLayoutProviderInterface::class)->getMock();

        $obj = new TestNavigationLayoutProviderTrait();

        $obj->setNavigationLayoutProvider($navigationLayoutProvider);
        $this->assertSame($navigationLayoutProvider, $obj->getNavigationLayoutProvider());
    }
}
