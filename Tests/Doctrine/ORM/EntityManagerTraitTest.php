<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Doctrine\ORM;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Doctrine\ORM\TestEntityManagerTrait;

/**
 * Entity manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Doctrine\ORM
 */
class EntityManagerTraitTest extends AbstractTestCase {

    /**
     * Test setEntityManager()
     *
     * @return void
     */
    public function testSetEntityManager(): void {

        $obj = new TestEntityManagerTrait();

        $obj->setEntityManager($this->entityManager);
        $this->assertSame($this->entityManager, $obj->getEntityManager());
    }
}
