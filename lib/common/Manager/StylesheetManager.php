<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Provider\StylesheetProviderInterface;

/**
 * Stylesheet manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class StylesheetManager extends AbstractManager implements StylesheetManagerInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.stylesheet";

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (false === ($provider instanceof StylesheetProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . StylesheetProviderInterface::class);
        }

        if (true === $this->containsProvider($provider)) {
            throw new AlreadyRegisteredProviderException($provider);
        }

        return parent::addProvider($provider);
    }

    /**
     * {@inheritDoc}
     */
    public function getStylesheets(): array {

        $stylesheets = [];

        /** @var StylesheetProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $stylesheets = array_merge($stylesheets, $current->getStylesheets());
        }

        return $stylesheets;
    }
}
