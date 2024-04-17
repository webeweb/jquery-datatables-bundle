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

use WBW\Bundle\WidgetBundle\Renderer\Strings\BoldTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\DeletedTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\InsertedTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\ItalicTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\MarkedTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\SmallTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\StrikethroughTextRendererTrait;
use WBW\Bundle\WidgetBundle\Renderer\Strings\UnderlinedTextRendererTrait;

/**
 * Strings renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Renderer
 */
trait StringsRendererTrait {

    use BoldTextRendererTrait;
    use DeletedTextRendererTrait;
    use InsertedTextRendererTrait;
    use ItalicTextRendererTrait;
    use MarkedTextRendererTrait;
    use SmallTextRendererTrait;
    use StrikethroughTextRendererTrait;
    use UnderlinedTextRendererTrait;
}
