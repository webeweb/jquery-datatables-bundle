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

namespace WBW\Bundle\BootstrapBundle\Renderer\Utility;

use WBW\Library\Common\Helper\StringHelper;

/**
 * Right-aligned text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Renderer\Utility
 */
trait RightAlignedTextRendererTrait {

    /**
     * Render a right-aligned text.
     *
     * @param string|null $text The text.
     * @return string|null Returns the right-aligned text.
     */
    protected function renderRightAlignedText(?string $text): ?string {

        if (null === $text || "" === $text) {
            return null;
        }

        return StringHelper::domNode("span", $text, ["class" => "text-right"]);
    }
}
