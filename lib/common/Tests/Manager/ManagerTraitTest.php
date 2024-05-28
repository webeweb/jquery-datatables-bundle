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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestManagerTrait;

/**
 * Manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ManagerTraitTest extends AbstractTestCase {

    /**
     * Test setManager()
     *
     * @return void
     */
    public function testSetManager(): void {

        // Set a Manager mock.
        $manager = $this->getMockBuilder(ManagerInterface::class)->getMock();

        $obj = new TestManagerTrait();

        $obj->setManager($manager);
        $this->assertSame($manager, $obj->getManager());
    }
}
