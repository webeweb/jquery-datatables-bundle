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

namespace WBW\Bundle\WidgetBundle\Alert;

use WBW\Bundle\WidgetBundle\Serializer\JsonSerializer;
use WBW\Library\Traits\Strings\StringContentTrait;
use WBW\Library\Traits\Strings\StringTypeTrait;

/**
 * Abstract alert.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Alert
 * @abstract
 */
abstract class AbstractAlert implements AlertInterface {

    use StringContentTrait;
    use StringTypeTrait;

    /**
     * Constructor.
     *
     * @param string|null $type The type.
     * @param string|null $content The content.
     */
    protected function __construct(?string $type, ?string $content = null) {
        $this->setContent($content);
        $this->setType($type);
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeAlert($this);
    }
}
