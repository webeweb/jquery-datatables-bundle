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

namespace WBW\Bundle\DataTablesBundle\Tests\Traits\Arrays;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Traits\Arrays\TestArrayEntitiesTrait;

/**
 * Array entities trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Traits\Arrays
 */
class ArrayEntitiesTraitTest extends AbstractTestCase {

    /**
     * Test setEntities()
     *
     * @return void
     */
    public function testSetEntities(): void {

        $obj = new TestArrayEntitiesTrait();

        $obj->setEntities([]);
        $this->assertEquals([], $obj->getEntities());
    }
}
