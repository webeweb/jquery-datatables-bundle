<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Manager;

use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\DataTablesBundle\Exception\UnregisteredDataTablesProviderException;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * DataTables manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Manager
 */
interface DataTablesManagerInterface extends ManagerInterface {

    /**
     * Get a provider.
     *
     * @param string $name The name.
     * @return DataTablesProviderInterface Returns the provider.
     * @throws UnregisteredDataTablesProviderException Throws an unregistered provider exception.
     */
    public function getProvider(string $name): DataTablesProviderInterface;
}
