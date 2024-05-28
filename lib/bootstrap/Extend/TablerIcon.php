<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\BootstrapBundle\Extend;

use WBW\Library\Widget\Component\AbstractIcon;

/**
 * Tabler icon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Extend
 */
class TablerIcon extends AbstractIcon implements TablerIconInterface {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }
}
