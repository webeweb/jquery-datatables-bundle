<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
interface ManagerInterface {

    /**
     * Add a provider.
     *
     * @param ProviderInterface $provider The provider.
     * @return ManagerInterface Returns this manager.
     * @throws AlreadyRegisteredProviderException Throws an already registered provider exception.
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface;

    /**
     * Determine if this manager contains a provider.
     *
     * @param ProviderInterface $provider The provider.
     * @return bool Returns true in case of success, false otherwise.
     * @throws InvalidArgumentException Throws an invalid argument exception.
     */
    public function containsProvider(ProviderInterface $provider): bool;

    /**
     * Get the providers.
     *
     * @return ProviderInterface[] Returns the provider.
     */
    public function &getProviders(): array;

    /**
     * Determine if this manager contains providers.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasProviders(): bool;

    /**
     * Index of a provider.
     *
     * @param ProviderInterface $provider The provider.
     * @return int Returns the index of in case of success, -1 otherwise.
     */
    public function indexOfProvider(ProviderInterface $provider): int;

    /**
     * Count.
     *
     * @return int Returns the providers count.
     */
    public function size(): int;
}
