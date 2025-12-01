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

namespace WBW\Bundle\DataTablesBundle\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as BaseWebTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests
 */
abstract class AbstractWebTestCase extends BaseWebTestCase {

    /**
     * Set up the employee entities.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected static function setUpEmployeeEntities(): void {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        $em->flush();
    }
}
