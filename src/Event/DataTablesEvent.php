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

namespace WBW\Bundle\DataTablesBundle\Event;

use WBW\Bundle\CommonBundle\Event\AbstractEvent;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderTrait;
use WBW\Bundle\DataTablesBundle\Traits\Arrays\ArrayEntitiesTrait;

/**
 * DataTables event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Event
 */
class DataTablesEvent extends AbstractEvent {

    use ArrayEntitiesTrait;
    use DataTablesProviderTrait;

    /**
     * Event "post delete".
     *
     * @var string
     */
    public const POST_DELETE = "wbw.datatables.event.post_delete";

    /**
     * Event "post edit".
     *
     * @var string
     */
    public const POST_EDIT = "wbw.datatables.event.post_edit";

    /**
     * Event "post export".
     *
     * @var string
     */
    public const POST_EXPORT = "wbw.datatables.event.post_export";

    /**
     * Event "post show".
     *
     * @var string
     */
    public const POST_INDEX = "wbw.datatables.event.post_index";

    /**
     * Event "pre delete".
     *
     * @var string
     */
    public const PRE_DELETE = "wbw.datatables.event.pre_delete";

    /**
     * Event "pre edit".
     *
     * @var string
     */
    public const PRE_EDIT = "wbw.datatables.event.pre_edit";

    /**
     * Event "pre export".
     *
     * @var string
     */
    public const PRE_EXPORT = "wbw.datatables.event.pre_export";

    /**
     * Event "pre index".
     *
     * @var string
     */
    public const PRE_INDEX = "wbw.datatables.event.pre_index";

    /**
     * Event "pre serialize".
     *
     * @var string
     */
    public const PRE_SERIALIZE = "wbw.datatables.event.pre_serialize";

    /**
     * Event "pre-show".
     *
     * @var string
     */
    public const PRE_SHOW = "wbw.datatables.event.pre_show";

    /**
     * Constructor.
     *
     * @param object[] $entities The entities.
     * @param string $eventName The name.
     * @param DataTablesProviderInterface|null $provider The provider.
     */
    public function __construct(array $entities, string $eventName, ?DataTablesProviderInterface $provider = null) {
        parent::__construct($eventName);

        $this->setEntities($entities);
        $this->setProvider($provider);
    }
}
