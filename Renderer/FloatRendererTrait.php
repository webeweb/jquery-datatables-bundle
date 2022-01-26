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
 * Float renderer trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Renderer
 */
trait FloatRendererTrait {

    /**
     * Render a float.
     *
     * @param float|null $number The number.
     * @param int $decimals The decimals.
     * @param string $decPoint The decimal point.
     * @param string $thousandsSep The thousands separator.
     * @return string|null Returns the rendered number.
     */
    protected function renderFloat(?float $number, int $decimals = 2, string $decPoint = ".", string $thousandsSep = ","): ?string {
        if (null === $number) {
            return null;
        }
        return number_format($number, $decimals, $decPoint, $thousandsSep);
    }
}
