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

namespace WBW\Bundle\WidgetBundle\Tests\Fixtures\Component;

use WBW\Bundle\WidgetBundle\Component\AbstractNotification;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;

/**
 * Test notification.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Fixtures\Component
 */
class TestNotification extends AbstractNotification {

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct("type", "content");
    }

    /**
     * {@inheritDoc}
     */
    public function setContent(string $content): NotificationInterface {
        return parent::setContent($content);
    }

    /**
     * {@inheritDoc}
     */
    public function setType(string $type): NotificationInterface {
        return parent::setType($type);
    }
}
