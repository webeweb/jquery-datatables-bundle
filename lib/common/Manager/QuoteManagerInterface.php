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

use WBW\Bundle\CommonBundle\Provider\QuoteProviderInterface;

/**
 * Quote manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
interface QuoteManagerInterface extends ManagerInterface {

    /**
     * Get a quote provider.
     *
     * @param string $domain The domain.
     * @return QuoteProviderInterface|null Returns the quote provider.
     */
    public function getProvider(string $domain): ?QuoteProviderInterface;
}
