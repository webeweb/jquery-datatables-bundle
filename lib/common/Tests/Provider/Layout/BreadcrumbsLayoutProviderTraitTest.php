<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\BreadcrumbsLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestBreadcrumbsLayoutProviderTrait;

/**
 * Breadcrumbs layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class BreadcrumbsLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setBreadcrumbsLayoutProvider()
     *
     * @return void
     */
    public function testSetBreadcrumbsLayoutProvider(): void {

        // Set a Breadcrumbs layout provider mock.
        $breadcrumbsLayoutProvider = $this->getMockBuilder(BreadcrumbsLayoutProviderInterface::class)->getMock();

        $obj = new TestBreadcrumbsLayoutProviderTrait();

        $obj->setBreadcrumbsLayoutProvider($breadcrumbsLayoutProvider);
        $this->assertSame($breadcrumbsLayoutProvider, $obj->getBreadcrumbsLayoutProvider());
    }
}
