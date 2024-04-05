<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Throwable;
use WBW\Bundle\CoreBundle\Config\ConfigurationHelper;
use WBW\Bundle\CoreBundle\Tests\AbstractWebTestCase as WebTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends WebTestCase {

    /**
     * List CSS assets.
     *
     * @return string[] Returns the CSS assets list.
     */
    public static function listCSSAssets(): array {

        $directory = realpath(__DIR__ . "/../DependencyInjection");

        // Load the YAML configuration.
        $config  = ConfigurationHelper::loadYamlConfig($directory, "assets");
        $version = $config["assets"]["wbw.datatables.asset.datatables"]["version"];
        $plugins = $config["assets"]["wbw.datatables.asset.datatables"]["plugins"];

        $assets = [];

        $assets[] = 'href="/bundles/wbwdatatables/datatables-' . $version . '/css/dataTables.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/css/autoFill.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/css/buttons.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-colreorder-' . $plugins["colreorder"]["version"] . '/css/colReorder.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-fixedcolumns-' . $plugins["fixedcolumns"]["version"] . '/css/fixedColumns.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-fixedheader-' . $plugins["fixedheader"]["version"] . '/css/fixedHeader.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-keytable-' . $plugins["keytable"]["version"] . '/css/keyTable.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/css/responsive.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-rowgroup-' . $plugins["rowgroup"]["version"] . '/css/rowGroup.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-rowreorder-' . $plugins["rowreorder"]["version"] . '/css/rowReorder.bootstrap.min.css"';
        $assets[] = 'href="/bundles/wbwdatatables/datatables-select-' . $plugins["select"]["version"] . '/css/select.bootstrap.min.css"';

        return $assets;
    }

    /**
     * List Javascript assets.
     *
     * @return string[] Returns the Javascript assets list.
     */
    public static function listJavascriptAssets(): array {

        $directory = realpath(__DIR__ . "/../DependencyInjection");

        // Load the YAML configuration.
        $config   = ConfigurationHelper::loadYamlConfig($directory, "assets");
        $version  = $config["assets"]["wbw.datatables.asset.datatables"]["version"];
        $requires = $config["assets"]["wbw.datatables.asset.datatables"]["requires"];
        $plugins  = $config["assets"]["wbw.datatables.asset.datatables"]["plugins"];

        $assets = [];

        $assets[] = 'src="/bundles/wbwdatatables/datatables-' . $version . '/js/jquery.dataTables.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-' . $version . '/js/dataTables.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/js/dataTables.autoFill.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-autofill-' . $plugins["autofill"]["version"] . '/js/autoFill.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-jszip-' . $requires["jszip"]["version"] . '/jszip.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-pdfmake-' . $requires["pdfmake"]["version"] . '/pdfmake.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-pdfmake-' . $requires["pdfmake"]["version"] . '/vfs_fonts.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/dataTables.buttons.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.colVis.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.flash.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.html5.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.print.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-buttons-' . $plugins["buttons"]["version"] . '/js/buttons.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-colreorder-' . $plugins["colreorder"]["version"] . '/js/dataTables.colReorder.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-fixedcolumns-' . $plugins["fixedcolumns"]["version"] . '/js/dataTables.fixedColumns.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-fixedheader-' . $plugins["fixedheader"]["version"] . '/js/dataTables.fixedHeader.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-keytable-' . $plugins["keytable"]["version"] . '/js/dataTables.keyTable.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/js/dataTables.responsive.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-responsive-' . $plugins["responsive"]["version"] . '/js/responsive.bootstrap.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-rowgroup-' . $plugins["rowgroup"]["version"] . '/js/dataTables.rowGroup.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-rowreorder-' . $plugins["rowreorder"]["version"] . '/js/dataTables.rowReorder.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-scroller-' . $plugins["scroller"]["version"] . '/js/dataTables.scroller.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/datatables-select-' . $plugins["select"]["version"] . '/js/dataTables.select.min.js"';
        $assets[] = 'src="/bundles/wbwdatatables/editable-table/mindmup-editabletable.js"';

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
     * @throws Throwable Throws an exception if an error occurs.
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
