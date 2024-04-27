<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;

/**
 * Quote manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class QuoteManager extends AbstractManager implements QuoteManagerInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.quote";

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (true === $this->containsProvider($provider)) {
            throw new AlreadyRegisteredProviderException($provider);
        }

        return parent::addProvider($provider);
    }

    /**
     * {@inheritDoc}
     */
    public function containsProvider(ProviderInterface $provider): bool {

        if (false === ($provider instanceof QuoteProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . QuoteProviderInterface::class);
        }

        /** @var QuoteProviderInterface $current */
        foreach ($this->getProviders() as $current) {

            if ($provider->getDomain() === $current->getDomain()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get a quote provider.
     *
     * @param string $domain The domain.
     * @return ProviderInterface|null Returns the quote provider.
     */
    public function getProvider(string $domain): ?ProviderInterface {

        /** @var QuoteProviderInterface $current */
        foreach ($this->getProviders() as $current) {

            if ($domain === $current->getDomain()) {
                return $current;
            }
        }

        return null;
    }
}