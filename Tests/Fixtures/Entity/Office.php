<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity;

/**
 * Office.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity
 */
class Office {

    /**
     * Id.
     *
     * @var int
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the id.
     *
     * @return int Returns the id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return Office Returns this office.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}
