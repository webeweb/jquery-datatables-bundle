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

namespace WBW\Bundle\WidgetBundle\Renderer\Strings;

use WBW\Library\Types\Helper\StringHelper;

/**
 * Bold text renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Renderer\Strings
 */
trait BoldTextRendererTrait {

    /**
     * Render a bold text.
     *
     * @param string|null $text The text.
     * @return string|null Returns the bold text.
     */
    protected function renderBoldText(?string $text): ?string {

        if (null === $text || "" === $text) {
            return null;
        }

        return StringHelper::domNode("strong", $text);
    }
}