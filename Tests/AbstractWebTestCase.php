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

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Exception;
use WBW\Bundle\CoreBundle\Tests\AbstractWebTestCase as WebTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\DataTablesVersionInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends WebTestCase {

    /**
     * Lists CSS assets.
     *
     * @return array Returns the CSS assets list.
     */
    public static function listCSSAssets() {

        $assets = [];

        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-" . DataTablesVersionInterface::DATATABLES_VERSION . "/css/dataTables.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-autofill-" . DataTablesVersionInterface::DATATABLES_AUTOFILL_VERSION . "/css/autoFill.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/css/buttons.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-colreorder-" . DataTablesVersionInterface::DATATABLES_COLREORDER_VERSION . "/css/colReorder.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-fixedcolumns-" . DataTablesVersionInterface::DATATABLES_FIXEDCOLUMNS_VERSION . "/css/fixedColumns.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-fixedheader-" . DataTablesVersionInterface::DATATABLES_FIXEDHEADER_VERSION . "/css/fixedHeader.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-keytable-" . DataTablesVersionInterface::DATATABLES_KEYTABLE_VERSION . "/css/keyTable.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-responsive-" . DataTablesVersionInterface::DATATABLES_RESPONSIVE_VERSION . "/css/responsive.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-rowgroup-" . DataTablesVersionInterface::DATATABLES_ROWGROUP_VERSION . "/css/rowGroup.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-rowreorder-" . DataTablesVersionInterface::DATATABLES_ROWREORDER_VERSION . "/css/rowReorder.bootstrap.min.css\"";
        $assets[] = "href=\"/bundles/wbwjquerydatatables/datatables-select-" . DataTablesVersionInterface::DATATABLES_SELECT_VERSION . "/css/select.bootstrap.min.css\"";

        return $assets;
    }

    /**
     * Lists Javascript assets.
     *
     * @return array Returns the Javascript assets list.
     */
    public static function listJavascriptAssets() {

        $assets = [];

        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-" . DataTablesVersionInterface::DATATABLES_VERSION . "/js/jquery.dataTables.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-" . DataTablesVersionInterface::DATATABLES_VERSION . "/js/dataTables.bootstrap.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-autofill-" . DataTablesVersionInterface::DATATABLES_AUTOFILL_VERSION . "/js/dataTables.autoFill.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-autofill-" . DataTablesVersionInterface::DATATABLES_AUTOFILL_VERSION . "/js/autoFill.bootstrap.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-jszip-" . DataTablesVersionInterface::DATATABLES_JSZIP_VERSION . "/jszip.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-pdfmake-" . DataTablesVersionInterface::DATATABLES_PDFMAKE_VERSION . "/pdfmake.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-pdfmake-" . DataTablesVersionInterface::DATATABLES_PDFMAKE_VERSION . "/vfs_fonts.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/dataTables.buttons.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/buttons.colVis.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/buttons.flash.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/buttons.html5.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/buttons.print.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-buttons-" . DataTablesVersionInterface::DATATABLES_BUTTONS_VERSION . "/js/buttons.bootstrap.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-colreorder-" . DataTablesVersionInterface::DATATABLES_COLREORDER_VERSION . "/js/dataTables.colReorder.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-fixedcolumns-" . DataTablesVersionInterface::DATATABLES_FIXEDCOLUMNS_VERSION . "/js/dataTables.fixedColumns.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-fixedheader-" . DataTablesVersionInterface::DATATABLES_FIXEDHEADER_VERSION . "/js/dataTables.fixedHeader.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-keytable-" . DataTablesVersionInterface::DATATABLES_KEYTABLE_VERSION . "/js/dataTables.keyTable.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-responsive-" . DataTablesVersionInterface::DATATABLES_RESPONSIVE_VERSION . "/js/dataTables.responsive.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-responsive-" . DataTablesVersionInterface::DATATABLES_RESPONSIVE_VERSION . "/js/responsive.bootstrap.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-rowgroup-" . DataTablesVersionInterface::DATATABLES_ROWGROUP_VERSION . "/js/dataTables.rowGroup.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-rowreorder-" . DataTablesVersionInterface::DATATABLES_ROWREORDER_VERSION . "/js/dataTables.rowReorder.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-scroller-" . DataTablesVersionInterface::DATATABLES_SCROLLER_VERSION . "/js/dataTables.scroller.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/datatables-select-" . DataTablesVersionInterface::DATATABLES_SELECT_VERSION . "/js/dataTables.select.min.js\"";
        $assets[] = "src=\"/bundles/wbwjquerydatatables/editable-table/mindmup-editabletable.js\"";

        return $assets;
    }

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        $entities = $em->getMetadataFactory()->getAllMetadata();

        $schemaTool = new SchemaTool($em);
        $schemaTool->dropDatabase();
        $schemaTool->createSchema($entities);
    }

    /**
     * Set up the employee fixtures.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    protected function setUpEmployeeFixtures() {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        $em->flush();
    }
}
