<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Event;

use WBW\Library\Widget\Component\ToastInterface;
use WBW\Library\Widget\Component\ToastTrait;

/**
 * Toast event.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Event
 */
class ToastEvent extends AbstractEvent {

    use ToastTrait;

    /**
     * Event "danger".
     *
     * @var string
     */
    public const DANGER = "wbw.common.event.toast.danger";

    /**
     * Event "info".
     *
     * @var string
     */
    public const INFO = "wbw.common.event.toast.info";

    /**
     * Event "success".
     *
     * @var string
     */
    public const SUCCESS = "wbw.common.event.toast.success";

    /**
     * Event "warning".
     *
     * @var string
     */
    public const WARNING = "wbw.common.event.toast.warning";

    /**
     * Constructor.
     *
     * @param ToastInterface $toast The toast.
     * @param string $eventName The event name.
     */
    public function __construct(ToastInterface $toast, string $eventName) {
        parent::__construct($eventName);

        $this->setToast($toast);
    }
}
