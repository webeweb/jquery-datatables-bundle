<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

use WBW\Bundle\WidgetBundle\Serializer\ComponentSerializer;
use WBW\Library\Traits\Strings\StringNameTrait;
use WBW\Library\Traits\Strings\StringStyleTrait;

/**
 * Abstract icon.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
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
        return ComponentSerializer::serializeIcon($this);
    }
}
