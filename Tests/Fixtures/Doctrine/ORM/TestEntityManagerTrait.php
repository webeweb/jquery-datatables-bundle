<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Doctrine\ORM;

use WBW\Bundle\DataTablesBundle\Doctrine\ORM\EntityManagerTrait;

/**
 * Test entity manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Doctrine\ORM
 */
class TestEntityManagerTrait {

    use EntityManagerTrait {
        setEntityManager as public;
    }
}
