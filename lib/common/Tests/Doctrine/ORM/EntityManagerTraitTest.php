<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Doctrine\ORM;

use Doctrine\ORM\EntityManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Doctrine\ORM\TestEntityManagerTrait;

/**
 * Entity manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Doctrine\ORM
 */
class EntityManagerTraitTest extends AbstractTestCase {

    /**
     * Test setEntityManager()
     *
     * @return void
     */
    public function testSetEntityManager(): void {

        // Set an Entity manager mock.
        $entityManager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();

        $obj = new TestEntityManagerTrait();

        $obj->setEntityManager($entityManager);
        $this->assertSame($entityManager, $obj->getEntityManager());
    }
}
