<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Icon;

use WBW\Bundle\WidgetBundle\Serializer\JsonSerializer;
use WBW\Library\Traits\Strings\StringNameTrait;
use WBW\Library\Traits\Strings\StringStyleTrait;

/**
 * Abstract icon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Icon
 * @abstract
 */
abstract class AbstractIcon implements IconInterface {

    use StringNameTrait;
    use StringStyleTrait;

    /**
     * Constructor.
     */
    protected function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeIcon($this);
    }
}
