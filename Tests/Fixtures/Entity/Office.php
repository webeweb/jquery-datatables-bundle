<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity;

use WBW\Library\Traits\Integers\IntegerIdTrait;

/**
 * Office.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity
 */
class Office {

    use IntegerIdTrait;

    /**
     * Name.
     *
     * @var string|null
     */
    private $name;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Set the name.
     *
     * @param string|null $name The name.
     * @return Office Returns this office.
     */
    public function setName(?string $name): Office {
        $this->name = $name;
        return $this;
    }
}
