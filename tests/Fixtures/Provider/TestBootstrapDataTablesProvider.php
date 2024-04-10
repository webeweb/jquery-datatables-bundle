<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider;

use DateTime;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Provider\BootstrapDataTablesProvider;

/**
 * Test Bootstrap DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider
 */
class TestBootstrapDataTablesProvider extends BootstrapDataTablesProvider {

    /**
     *{@inheritDoc}
     */
    public function getColumns(): array {
        return [];
    }

    /**
     *{@inheritDoc}
     */
    public function getEntity(): string {
        return "test";
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return "test";
    }

    /**
     *{@inheritDoc}
     */
    public function getPrefix(): string {
        return "t";
    }

    /**
     *{@inheritDoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonComment($entity, string $route, ?string $comment): string {
        return parent::renderActionButtonComment($entity, $route, $comment);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonDelete($entity, string $route): string {
        return parent::renderActionButtonDelete($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonDuplicate($entity, string $route): string {
        return parent::renderActionButtonDuplicate($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonEdit($entity, string $route): string {
        return parent::renderActionButtonEdit($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonNew($entity, string $route): string {
        return parent::renderActionButtonNew($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonPdf($entity, string $route): string {
        return parent::renderActionButtonPdf($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonShow($entity, string $route): string {
        return parent::renderActionButtonShow($entity, $route);
    }

    /**
     *{@inheritDoc}
     */
    public function renderActionButtonSwitch($entity, string $route, ?bool $enabled): string {
        return parent::renderActionButtonSwitch($entity, $route, $enabled);
    }

    /**
     *{@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity): ?string {
        return null;
    }

    /**
     *{@inheritDoc}
     */
    public function renderDate(?DateTime $date, string $format = "d/m/Y"): ?string {
        return parent::renderDate($date, $format);
    }

    /**
     *{@inheritDoc}
     */
    public function renderDateTime(?DateTime $date, string $format = "d/m/Y H:i"): ?string {
        return parent::renderDateTime($date, $format);
    }

    /**
     *{@inheritDoc}
     */
    public function renderFloat(?float $number, int $decimals = 2, string $decPoint = ".", string $thousandsSep = ","): ?string {
        return parent::renderFloat($number, $decimals, $decPoint, $thousandsSep);
    }

    /**
     *{@inheritDoc}
     */
    public function renderPercent(?float $number): ?string {
        return parent::renderPercent($number);
    }

    /**
     *{@inheritDoc}
     */
    public function renderPrice(?float $number, string $currency = "€"): ?string {
        return parent::renderPrice($number, $currency);
    }

    /**
     *{@inheritDoc}
     */
    public function renderRowButtons($entity, string $showRoute = null, string $editRoute = null, string $deleteRoute = null): string {
        return parent::renderRowButtons($entity, $showRoute, $editRoute, $deleteRoute);
    }
}
