<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Renderer;

/**
 * String wrapper trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer
 */
trait StringWrapperTrait {

    /**
     * Wrap a string.
     *
     * @param string|null $str The string.
     * @param string|null $prefix The prefix.
     * @param string|null $suffix The suffix.
     * @return string|null Returns the wrapped string.
     */
    protected function wrapString(?string $str, ?string $prefix, ?string $suffix): ?string {

        if (null === $str) {
            return null;
        }

        $output = [
            $str,
        ];

        if (null !== $prefix) {
            array_unshift($output, $prefix);
        }
        if (null !== $suffix) {
            array_push($output, $suffix);
        }

        return implode("", $output);
    }
}
