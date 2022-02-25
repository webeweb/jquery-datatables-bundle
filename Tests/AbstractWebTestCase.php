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
use Exception;
use WBW\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Tests\AbstractWebTestCase as WebTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends WebTestCase {

    /**
     * Lists CSS assets.
     *
     * @return string[] Returns the CSS assets list.
     */
    public static function listCSSAssets(): array {

        $directory = realpath(__DIR__ . "/../DependencyInjection");

        // Load the YAML configuration.
        $config  = ConfigurationHelper::loadYamlConfig($directory, "assets");
        $version = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["version"];
        $plugins = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["plugins"];

        $assets = [];

        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-' . $version . '/css/dataTables.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/css/autoFill.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/css/buttons.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-colreorder-' . $plugins["colreorder"]["version"] . '/css/colReorder.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-fixedcolumns-' . $plugins["fixedcolumns"]["version"] . '/css/fixedColumns.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-fixedheader-' . $plugins["fixedheader"]["version"] . '/css/fixedHeader.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-keytable-' . $plugins["keytable"]["version"] . '/css/keyTable.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/css/responsive.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-rowgroup-' . $plugins["rowgroup"]["version"] . '/css/rowGroup.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-rowreorder-' . $plugins["rowreorder"]["version"] . '/css/rowReorder.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwjquerydatatables/datatables-select-' . $plugins["select"]["version"] . '/css/select.bootstrap.min.css"';

        return $assets;
    }

    /**
     * Lists Javascript assets.
     *
     * @return string[] Returns the Javascript assets list.
     */
    public static function listJavascriptAssets(): array {

        $directory = realpath(__DIR__ . "/../DependencyInjection");

        // Load the YAML configuration.
        $config   = ConfigurationHelper::loadYamlConfig($directory, "assets");
        $version  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["version"];
        $requires = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["requires"];
        $plugins  = $config["assets"]["wbw.jquery_datatables.asset.jquery_datatables"]["plugins"];

        $assets = [];

        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-' . $version . '/js/jquery.dataTables.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-' . $version . '/js/dataTables.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/js/dataTables.autoFill.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/js/autoFill.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-jszip-' . $requires["jszip"]["version"] . '/jszip.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-pdfmake-' . $requires["pdfmake"]["version"] . '/pdfmake.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-pdfmake-' . $requires["pdfmake"]["version"] . '/vfs_fonts.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/dataTables.buttons.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.colVis.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.flash.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.html5.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.print.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-colreorder-' . $plugins["colreorder"]["version"] . '/js/dataTables.colReorder.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-fixedcolumns-' . $plugins["fixedcolumns"]["version"] . '/js/dataTables.fixedColumns.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-fixedheader-' . $plugins["fixedheader"]["version"] . '/js/dataTables.fixedHeader.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-keytable-' . $plugins["keytable"]["version"] . '/js/dataTables.keyTable.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/js/dataTables.responsive.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/js/responsive.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-rowgroup-' . $plugins["rowgroup"]["version"] . '/js/dataTables.rowGroup.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-rowreorder-' . $plugins["rowreorder"]["version"] . '/js/dataTables.rowReorder.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-scroller-' . $plugins["scroller"]["version"] . '/js/dataTables.scroller.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/datatables-select-' . $plugins["select"]["version"] . '/js/dataTables.select.min.js"';
        $assets[] = 'src="/bundles/wbwjquerydatatables/editable-table/mindmup-editabletable.js"';

        return $assets;
    }

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        parent::setUpSchemaTool();

        // Set a default timezone.
        date_default_timezone_set("UTC");
    }

    /**
     * Set up the employee fixtures.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    protected static function setUpEmployeeFixtures(): void {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        foreach (TestFixtures::getEmployees() as $entity) {
            $em->persist($entity);
        }

        $em->flush();
    }
}
