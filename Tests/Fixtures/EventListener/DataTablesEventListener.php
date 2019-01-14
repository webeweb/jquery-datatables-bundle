<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\EventListener;

use Symfony\Component\EventDispatcher\Event;
use WBW\Bundle\JQuery\DataTablesBundle\Event\DataTablesEvent;

/**
 * DataTables event listener.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\EventListener
 */
class DataTablesEventListener {

    /**
     * On post delete.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPostDelete(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On post edit.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPostEdit(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On post export.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPostExport(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On post index.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPostIndex(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On pre delete.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPreDelete(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On pre edit.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPreEdit(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On pre export.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPreExport(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On pre index.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPreIndex(DataTablesEvent $event) {
        return $event;
    }

    /**
     * On pre show.
     *
     * @param DataTablesEvent $event The event.
     * @return Event Returns the event.
     */
    public function onPreShow(DataTablesEvent $event) {
        return $event;
    }
}
