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

namespace WBW\Bundle\WidgetBundle\Renderer;

use WBW\Bundle\WidgetBundle\Renderer\DateTimes\DateRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\DateTimes\DateTimeRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\DateTimes\TimeRendererTrait;

/**
 * Date/times renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Renderer
 */
trait DateTimesRendererTrait {

    use DateRendererTrait;
    use DateTimeRendererTrait;
    use TimeRendererTrait;
}
