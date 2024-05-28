<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Manager;

use InvalidArgumentException;
use WBW\Bundle\CommonBundle\Exception\AlreadyRegisteredProviderException;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Color manager.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
class ColorManager extends AbstractManager implements ColorManagerInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.manager.color";

    /**
     * {@inheritDoc}
     */
    public function addProvider(ProviderInterface $provider): ManagerInterface {

        if (false === ($provider instanceof ColorProviderInterface)) {
            throw new InvalidArgumentException("The provider must implements " . ColorProviderInterface::class);
        }

        if (true === $this->containsProvider($provider)) {
            throw new AlreadyRegisteredProviderException($provider);
        }

        return parent::addProvider($provider);
    }
}
