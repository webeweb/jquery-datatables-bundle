<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests;

use Doctrine\ORM\Tools\SchemaTool;
use WBW\Bundle\CoreBundle\Tests\AbstractWebTestCase as WebTestCase;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends WebTestCase {

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();

        // Get the entity manager.
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        // Get all entities.
        $entities = $em->getMetadataFactory()->getAllMetadata();

        // Initialize the database.
        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        $schemaTool->createSchema($entities);
    }
}
