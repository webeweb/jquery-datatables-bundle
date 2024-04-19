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

namespace WBW\Bundle\WidgetBundle\Component\Image;

use WBW\Bundle\WidgetBundle\Component\AbstractImage;

/**
 * Default image.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component\Image
 */
class DefaultImage extends AbstractImage {

    /**
     * Constructor.
     *
     * @param string $pathname The pathname.
     */
    public function __construct(string $pathname) {
        parent::__construct($pathname);

        $this->load();
    }
}
