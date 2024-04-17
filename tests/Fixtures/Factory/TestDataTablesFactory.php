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

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Factory;

use Symfony\Component\HttpFoundation\Request;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOrderInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesRequestInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesSearchInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;

/**
 * Test DataTables factory.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Factory
 */
class TestDataTablesFactory extends DataTablesFactory {

    /**
     * {@inheritDoc}
     */
    public static function newResponse(DataTablesWrapperInterface $wrapper): DataTablesResponseInterface {
        return parent::newResponse($wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseColumn(array $rawColumn, DataTablesWrapperInterface $wrapper): ?DataTablesColumnInterface {
        return parent::parseColumn($rawColumn, $wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseColumns(array $rawColumns, DataTablesWrapperInterface $wrapper): array {
        return parent::parseColumns($rawColumns, $wrapper);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseOrder(array $rawOrder): DataTablesOrderInterface {
        return parent::parseOrder($rawOrder);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseOrders(array $rawOrders): array {
        return parent::parseOrders($rawOrders);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseRequest(DataTablesWrapperInterface $wrapper, Request $request): DataTablesRequestInterface {
        return parent::parseRequest($wrapper, $request);
    }

    /**
     * {@inheritDoc}
     */
    public static function parseSearch(array $rawSearch): DataTablesSearchInterface {
        return parent::parseSearch($rawSearch);
    }
}
