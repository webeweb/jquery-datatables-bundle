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

use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestApplicationLayoutProviderTrait;

/**
 * Application layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class ApplicationLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setApplicationLayoutProvider()
     *
     * @return void
     */
    public function testSetApplicationLayoutProvider(): void {

        // Set an Application layout provider mock.
        $applicationLayoutProvider = $this->getMockBuilder(ApplicationLayoutProviderInterface::class)->getMock();

        $obj = new TestApplicationLayoutProviderTrait();

        $obj->setApplicationLayoutProvider($applicationLayoutProvider);
        $this->assertSame($applicationLayoutProvider, $obj->getApplicationLayoutProvider());
    }
}
