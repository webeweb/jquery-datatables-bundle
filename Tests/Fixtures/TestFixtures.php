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

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Library\Types\Helper\StringHelper;

/**
 * Test fixtures.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\App
 */
class TestFixtures {

    /**
     * Build POST data.
     *
     * @param DataTablesProviderInterface $dtProvider The provider.
     * @return array<string, mixed> Returns the POST data.
     */
    public static function buildPOSTData(DataTablesProviderInterface $dtProvider): array {

        $postData = [];

        $postData["columns"] = [];

        foreach ($dtProvider->getColumns() as $current) {

            $buffer = [];

            $buffer["data"]            = $current->getData();
            $buffer["name"]            = $current->getName();
            $buffer["orderable"]       = StringHelper::parseBoolean($current->getOrderable());
            $buffer["search"]["regex"] = StringHelper::parseBoolean(false);
            $buffer["search"]["value"] = "";
            $buffer["searchable"]      = StringHelper::parseBoolean($current->getSearchable());

            $postData["columns"][] = $buffer;
        }

        $fixtures["draw"]   = "1";
        $fixtures["length"] = "10";

        $fixtures["order"][0]["column"] = "0";
        $fixtures["order"][0]["dir"]    = "asc";

        $fixtures["search"]["regex"] = "false";
        $fixtures["search"]["value"] = "";

        $fixtures["start"] = "0";

        return $postData;
    }
}
