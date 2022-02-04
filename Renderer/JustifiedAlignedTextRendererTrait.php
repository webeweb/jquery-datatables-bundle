<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer;

use WBW\Library\Types\Helper\StringHelper;

/**
 * Justified-aligned text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer
 */
trait JustifiedAlignedTextRendererTrait {

    /**
     * Render a justified-aligned text.
     *
     * @param string|null $str The string.
     * @return string|null Returns the justified-aligned text.
     */
    protected function renderJustifiedAlignedText(?string $str): ?string {
        if (null === $str || "" === $str) {
            return null;
        }
        return StringHelper::domNode("span", $str, ["class" => "text-justified"]);
    }
}
