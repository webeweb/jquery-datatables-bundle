<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Provider;

/**
 * DataTables provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
trait DataTablesProviderTrait {

    /**
     * Provider.
     *
     * @var DataTablesProviderInterface|null
     */
    protected $provider;

    /**
     * Get the provider.
     *
     * @return DataTablesProviderInterface|null Returns the provider.
     */
    public function getProvider(): ?DataTablesProviderInterface {
        return $this->provider;
    }

    /**
     * Set the provider.
     *
     * @param DataTablesProviderInterface|null $provider The provider.
     * @return self Returns this instance.
     */
    protected function setProvider(?DataTablesProviderInterface $provider): self {
        $this->provider = $provider;
        return $this;
    }
}
