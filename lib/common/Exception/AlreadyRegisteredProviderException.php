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

namespace WBW\Bundle\CommonBundle\Exception;

use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Already registered provider exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Exception
 */
class AlreadyRegisteredProviderException extends AbstractException {

    /**
     * Constructor.
     *
     * @param ProviderInterface $provider The provider.
     */
    public function __construct(ProviderInterface $provider) {
        $format = 'The provider "%s" is already registered';
        parent::__construct(sprintf($format, get_class($provider)));
    }
}
