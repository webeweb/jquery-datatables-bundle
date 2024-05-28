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

use WBW\Bundle\CommonBundle\Provider\Layout\SearchLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestSearchLayoutProviderTrait;

/**
 * Search layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class SearchLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setSearchLayoutProvider()
     *
     * @return void
     */
    public function testSetSearchLayoutProvider(): void {

        // Set a Search layout provider mock.
        $searchLayoutProvider = $this->getMockBuilder(SearchLayoutProviderInterface::class)->getMock();

        $obj = new TestSearchLayoutProviderTrait();

        $obj->setSearchLayoutProvider($searchLayoutProvider);
        $this->assertSame($searchLayoutProvider, $obj->getSearchLayoutProvider());
    }
}
