<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Component;

use WBW\Bundle\WidgetBundle\Serializer\Component\JsonSerializer;
use WBW\Library\Traits\Strings\StringNameTrait;

/**
 * Abstract color.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 * @abstract
 */
abstract class AbstractColor implements ColorInterface {

    use StringNameTrait;

    /**
     * Constructor.
     *
     * @param string $name The name.
     */
    protected function __construct(string $name) {
        $this->setName($name);
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeColor($this);
    }
}
