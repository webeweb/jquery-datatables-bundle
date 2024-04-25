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

namespace WBW\Bundle\BootstrapBundle\Renderer\Utility;

use WBW\Library\Common\Helper\StringHelper;

/**
 * No wrap text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Renderer\Utility
 */
trait NoWrapTextRendererTrait {

    /**
     * Render a no wrap text.
     *
     * @param string|null $text The text.
     * @return string|null Returns the no wrap text.
     */
    protected function renderNoWrapText(?string $text): ?string {

        if (null === $text || "" === $text) {
            return null;
        }

        return StringHelper::domNode("span", $text, ["class" => "text-nowrap"]);
    }
}
