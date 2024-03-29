<?php

declare(strict_types = 1);

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
use WBW\Bundle\JQuery\DataTablesBundle\Traits\Arrays\ArrayEntitiesTrait;

/**
 * DataTables event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Event
 */
class DataTablesEvent extends AbstractEvent {

    use ArrayEntitiesTrait;
    use DataTablesProviderTrait;

    /**
     * Event "post delete".
     *
     * @var string
     */
    public const POST_DELETE = "wbw.jquery.datatables.event.post_delete";

    /**
     * Event "post edit".
     *
     * @var string
     */
    public const POST_EDIT = "wbw.jquery.datatables.event.post_edit";

    /**
     * Event "post export".
     *
     * @var string
     */
    public const POST_EXPORT = "wbw.jquery.datatables.event.post_export";

    /**
     * Event "post show".
     *
     * @var string
     */
    public const POST_INDEX = "wbw.jquery.datatables.event.post_index";

    /**
     * Event "pre delete".
     *
     * @var string
     */
    public const PRE_DELETE = "wbw.jquery.datatables.event.pre_delete";

    /**
     * Event "pre edit".
     *
     * @var string
     */
    public const PRE_EDIT = "wbw.jquery.datatables.event.pre_edit";

    /**
     * Event "pre export".
     *
     * @var string
     */
    public const PRE_EXPORT = "wbw.jquery.datatables.event.pre_export";

    /**
     * Event "pre index".
     *
     * @var string
     */
    public const PRE_INDEX = "wbw.jquery.datatables.event.pre_index";

    /**
     * Event "pre serialize".
     *
     * @var string
     */
    public const PRE_SERIALIZE = "wbw.jquery.datatables.event.pre_serialize";

    /**
     * Event "pre show".
     *
     * @var string
     */
    public const PRE_SHOW = "wbw.jquery.datatables.event.pre_show";

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
}
