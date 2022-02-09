<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer\Strings;

use WBW\Library\Types\Helper\StringHelper;

/**
 * Left-aligned text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer\Strings
 */
trait LeftAlignedTextRendererTrait {

    /**
     * Render a left-aligned text.
     *
     * @param string|null $str The string.
     * @return string|null Returns the left-aligned text.
     */
    protected function renderLeftAlignedText(?string $str): ?string {
        if (null === $str || "" === $str) {
            return null;
        }
        return StringHelper::domNode("span", $str, ["class" => "text-left"]);
    }
}
