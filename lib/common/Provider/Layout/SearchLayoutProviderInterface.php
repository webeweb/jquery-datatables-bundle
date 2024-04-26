<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;

/**
 * Search layout provider interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
interface SearchLayoutProviderInterface extends LayoutProviderInterface {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.layout.search";
}
