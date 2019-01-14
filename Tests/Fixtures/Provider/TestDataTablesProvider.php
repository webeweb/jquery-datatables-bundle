<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider;

use DateTime;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\AbstractDataTablesProvider;

/**
 * Test DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider
 */
class TestDataTablesProvider extends AbstractDataTablesProvider {

    /**
     *{@inheritdoc}
     */
    public function getCSVExporter() {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function getColumns() {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function getEditor() {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function getEntity() {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return "abstract";
    }

    /**
     *{@inheritdoc}
     */
    public function getPrefix() {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function getView() {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function renderButtons($entity, $editRoute, $deleteRoute = null, $enableDelete = true) {
        return parent::renderButtons($entity, $editRoute, $deleteRoute, $enableDelete);
    }

    /**
     *{@inheritdoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function renderDate(DateTime $date = null, $format = "d/m/Y") {
        return parent::renderDate($date, $format);
    }

    /**
     *{@inheritdoc}
     */
    public function renderDateTime(DateTime $date = null, $format = "d/m/Y H:i") {
        return parent::renderDateTime($date, $format);
    }

    /**
     *{@inheritdoc}
     */
    public function renderFloat($number, $decimals = 2, $decPoint = ".", $thousandsSep = ",") {
        return parent::renderFloat($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     *{@inheritdoc}
     */
    public function renderRow($dtRow, $entity, $rowNumber) {
        return null;
    }
}
