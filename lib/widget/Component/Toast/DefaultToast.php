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

namespace WBW\Bundle\WidgetBundle\Component\Toast;

use WBW\Bundle\WidgetBundle\Component\AbstractToast;

/**
 * Default toast.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Toast
 */
class DefaultToast extends AbstractToast {

    /**
     * Constructor.
     *
     * @param string $type The type.
     * @param string $content The content.
     */
    public function __construct(string $type, string $content) {
        parent::__construct($type, $content);
    }
}
