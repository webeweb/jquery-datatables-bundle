<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Provider\JavascriptProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Javascript manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class JavascriptManager extends AbstractManager implements JavascriptManagerInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.javascript";

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (false === ($provider instanceof JavascriptProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . JavascriptProviderInterface::class);
        }

        if (true === $this->containsProvider($provider)) {
            throw new AlreadyRegisteredProviderException($provider);
        }

        return parent::addProvider($provider);
    }

    /**
     * {@inheritDoc}
     */
    public function getJavascripts(): array {

        $javascripts = [];

        /** @var JavascriptProviderInterface $current */
        foreach ($this->getProviders() as $current) {
            $javascripts = array_merge($javascripts, $current->getJavascripts());
        }

        return $javascripts;
    }
}
