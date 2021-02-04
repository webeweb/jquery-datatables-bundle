<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Event;

use WBW\Bundle\CoreBundle\Event\AbstractEvent;

/**
 * DataTables event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Event
 */
class DataTablesEvent extends AbstractEvent {

    /**
     * Entities.
     *
     * @var array
     */
    private $entities;

    /**
     * Constructor.
     *
     * @param string $eventName The name.
     * @param object[] $entities The entities.
     */
    public function __construct(string $eventName, array $entities) {
        parent::__construct($eventName);
        $this->setEntities($entities);
    }

    /**
     * Get the entities.
     *
     * @return object[] Returns the entities.
     */
    public function getEntities(): array {
        return $this->entities;
    }

    /**
     * Set the entities.
     *
     * @param object[] $entities The entities.
     * @return DataTablesEvent Returns this event.
     */
    protected function setEntities(array $entities): DataTablesEvent {
        $this->entities = $entities;
        return $this;
    }
}
