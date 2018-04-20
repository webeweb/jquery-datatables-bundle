<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Controller;

use WBW\Bundle\JQuery\DatatablesBundle\Tests\AbstractWebTestCase;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\App\TestFixtures;

/**
 * DataTables controller test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Controller
 * @final
 */
final class DataTablesControllerTest extends AbstractWebTestCase {

    /**
     * {@inheritdoc}
     */
    protected function setUp() {

        // Get the entity manager.
        $em = self::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        // Persist each entity.
        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        // Flush entities.
        $em->flush();
    }

    /**
     * Tests the indexAction() method.
     *
     * @return void
     */
    public function testIndexAction() {

        $client = static::createClient();

        $client->request("GET", "/datatables/index/employee");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
