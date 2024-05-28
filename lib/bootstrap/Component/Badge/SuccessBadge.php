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

namespace WBW\Bundle\BootstrapBundle\Component\Badge;

use WBW\Bundle\BootstrapBundle\Component\AbstractBadge;

/**
 * Success badge.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Component\Badge
 */
class SuccessBadge extends AbstractBadge {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct(self::BADGE_TYPE_SUCCESS);
    }
}
