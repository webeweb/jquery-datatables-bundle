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
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\AbstractDataTablesProvider;

/**
 * Test DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider
 */
class TestDataTablesProvider extends AbstractDataTablesProvider {

    /**
     *{@inheritdoc}
     */
    public function getColumns(): array {
        return [];
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
    public function getName(): string {
        return "test";
    }

    /**
     *{@inheritdoc}
     */
    public function getPrefix(): string {
        return "t";
    }

    /**
     *{@inheritdoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonComment($entity, string $route, ?string $comment): string {
        return parent::renderActionButtonComment($entity, $route, $comment);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonDelete($entity, string $route): string {
        return parent::renderActionButtonDelete($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonDuplicate($entity, string $route): string {
        return parent::renderActionButtonDuplicate($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonEdit($entity, string $route): string {
        return parent::renderActionButtonEdit($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonNew($entity, string $route): string {
        return parent::renderActionButtonNew($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonPdf($entity, string $route): string {
        return parent::renderActionButtonPdf($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonShow($entity, string $route): string {
        return parent::renderActionButtonShow($entity, $route);
    }

    /**
     *{@inheritdoc}
     */
    public function renderActionButtonSwitch($entity, string $route, ?bool $enabled): string {
        return parent::renderActionButtonSwitch($entity, $route, $enabled);
    }

    /**
     *{@inheritdoc}
     */
    public function renderButtons($entity, string $editRoute, string $deleteRoute = null, bool $enableDelete = true): string {
        return parent::renderButtons($entity, $editRoute, $deleteRoute, $enableDelete);
    }

    /**
     *{@inheritdoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity): ?string {
        return null;
    }

    /**
     *{@inheritdoc}
     */
    public function renderDate(?DateTime $date, string $format = "d/m/Y"): ?string {
        return parent::renderDate($date, $format);
    }

    /**
     *{@inheritdoc}
     */
    public function renderDateTime(?DateTime $date, string $format = "d/m/Y H:i"): ?string {
        return parent::renderDateTime($date, $format);
    }

    /**
     *{@inheritdoc}
     */
    public function renderFloat(?float $number, int $decimals = 2, string $decPoint = ".", string $thousandsSep = ","): ?string {
        return parent::renderFloat($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     *{@inheritdoc}
     */
    public function renderPercent(?float $number): ?string {
        return parent::renderPercent($number);
    }

    /**
     *{@inheritdoc}
     */
    public function renderPrice(?float $number, string $currency = "€"): ?string {
        return parent::renderPrice($number, $currency);
    }

    /**
     *{@inheritdoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {
        return parent::renderRow($dtRow, $entity, $rowNumber);
    }

    /**
     *{@inheritdoc}
     */
    public function renderRowButtons($entity, string $editRoute = null, string $deleteRoute = null, string $showRoute = null): string {
        return parent::renderRowButtons($entity, $editRoute, $deleteRoute, $showRoute);
    }

    /**
     *{@inheritdoc}
     */
    public function wrapContent(?string $prefix, string $content, ?string $suffix): string {
        return parent::wrapContent($prefix, $content, $suffix);
    }
}
