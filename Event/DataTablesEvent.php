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
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderTrait;

/**
 * DataTables event.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Event
 */
class DataTablesEvent extends AbstractEvent {

    use DataTablesProviderTrait;

    /**
     * Event "post delete".
     *
     * @var string
     */
    const POST_DELETE = "wbw.jquery.datatables.event.post_delete";

    /**
     * Event "post edit".
     *
     * @var string
     */
    const POST_EDIT = "wbw.jquery.datatables.event.post_edit";

    /**
     * Event "post export".
     *
     * @var string
     */
    const POST_EXPORT = "wbw.jquery.datatables.event.post_export";

    /**
     * Event "post show".
     *
     * @var string
     */
    const POST_INDEX = "wbw.jquery.datatables.event.post_index";

    /**
     * Event "pre delete".
     *
     * @var string
     */
    const PRE_DELETE = "wbw.jquery.datatables.event.pre_delete";

    /**
     * Event "pre edit".
     *
     * @var string
     */
    const PRE_EDIT = "wbw.jquery.datatables.event.pre_edit";

    /**
     * Event "pre export".
     *
     * @var string
     */
    const PRE_EXPORT = "wbw.jquery.datatables.event.pre_export";

    /**
     * Event "pre index".
     *
     * @var string
     */
    const PRE_INDEX = "wbw.jquery.datatables.event.pre_index";

    /**
     * Event "pre serialize".
     *
     * @var string
     */
    const PRE_SERIALIZE = "wbw.jquery.datatables.event.pre_serialize";

    /**
     * Event "pre show".
     *
     * @var string
     */
    const PRE_SHOW = "wbw.jquery.datatables.event.pre_show";

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
     * @param DataTablesProviderInterface|null $provider The provider.
     */
    public function __construct(string $eventName, array $entities, ?DataTablesProviderInterface $provider = null) {
        parent::__construct($eventName);

        $this->setEntities($entities);
        $this->setProvider($provider);
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
