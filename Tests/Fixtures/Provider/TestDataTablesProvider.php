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
     *{@inheritDoc}
     */
    public function getColumns() {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function getEntity() {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getName() {
        return "abstract";
    }

    /**
     *{@inheritDoc}
     */
    public function getPrefix() {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function getView() {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonDelete($entity, $route) {
        return parent::renderActionButtonDelete($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonDuplicate($entity, $route) {
        return parent::renderActionButtonDuplicate($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonEdit($entity, $route) {
        return parent::renderActionButtonEdit($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonShow($entity, $route) {
        return parent::renderActionButtonShow($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderButtons($entity, $editRoute, $deleteRoute = null, $enableDelete = true) {
        return parent::renderButtons($entity, $editRoute, $deleteRoute, $enableDelete);
    }

    /**
     *{@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function renderDate(DateTime $date = null, $format = "d/m/Y") {
        return parent::renderDate($date, $format);
    }

    /**
     *{@inheritDoc}
     */
    public function renderDateTime(DateTime $date = null, $format = "d/m/Y H:i") {
        return parent::renderDateTime($date, $format);
    }

    /**
     *{@inheritDoc}
     */
    public function renderFloat($number, $decimals = 2, $decPoint = ".", $thousandsSep = ",") {
        return parent::renderFloat($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     *{@inheritDoc}
     */
    public function renderRow($dtRow, $entity, $rowNumber) {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function renderRowButtons($entity, $editRoute = null, $deleteRoute = null, $showRoute = null) {
        return parent::renderRowButtons($entity, $editRoute, $deleteRoute, $showRoute);
    }

    /**
     *{@inheritDoc}
     */
    public function wrapContent($prefix, $content, $suffix) {
        return parent::wrapContent($prefix, $content, $suffix);
    }
}
