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

namespace WBW\Bundle\WidgetBundle\Component;

use WBW\Bundle\WidgetBundle\Serializer\ComponentSerializer;
use WBW\Library\Traits\Integers\IntegerPositionTrait;
use WBW\Library\Traits\Strings\StringLabelTrait;

/**
 * Abstract dropdown item.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Component
 * @abstract
 */
class AbstractDropdownItem implements DropdownItemInterface {

    use IntegerPositionTrait;
    use StringLabelTrait;

    /**
     * By default.
     *
     * @var bool|null
     */
    protected $byDefault;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * {@inheritDoc}
     */
    public function getByDefault(): ?bool {
        return $this->byDefault;
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return ComponentSerializer::serializeDropdownItem($this);
    }

    /**
     * {@inheritDoc}
     */
    public function setByDefault(?bool $byDefault): DropdownItemInterface {
        $this->byDefault = $byDefault;
        return $this;
    }
}
