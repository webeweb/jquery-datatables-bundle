<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Provider\DefaultDataTablesProvider;

/**
 * Test default DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider
 */
class TestDefaultDataTablesProvider extends DefaultDataTablesProvider {

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
     * {@inheritDoc}
     */
    public function getPrefix(): string {
        return "t";
    }

    /**
     *{ @inheritDoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {
        return null;
    }
}
