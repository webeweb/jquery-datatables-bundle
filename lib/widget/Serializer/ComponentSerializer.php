<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Serializer;

use WBW\Bundle\WidgetBundle\Assets\FullCalendar\FullCalendarEventInterface;
use WBW\Bundle\WidgetBundle\Component\AlertInterface;
use WBW\Bundle\WidgetBundle\Component\BadgeInterface;
use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Component\IconInterface;
use WBW\Bundle\WidgetBundle\Component\LabelInterface;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Component serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Serializer
 */
class ComponentSerializer {

    /**
     * Serialize an alert.
     *
     * @param AlertInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeAlert(AlertInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize an badge.
     *
     * @param BadgeInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeBadge(BadgeInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize a button.
     *
     * @param ButtonInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeButton(ButtonInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize a Full Calendar event.
     *
     * @param FullCalendarEventInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeFullCalendarEvent(FullCalendarEventInterface $model): array {

        $output = [];

        ArrayHelper::set($output, "id", $model->getId(), [null]);
        ArrayHelper::set($output, "groupId", $model->getGroupId(), [null]);
        ArrayHelper::set($output, "allDay", $model->getAllDay(), [null]);

        if (null !== $model->getStart()) {
            ArrayHelper::set($output, "start", $model->getStart()->format("Y-m-d\TH:i:s"));
        }

        if (null !== $model->getEnd()) {
            ArrayHelper::set($output, "end", $model->getEnd()->format("Y-m-d\TH:i:s"));
        }

        ArrayHelper::set($output, "startStr", $model->getStartStr(), [null]);
        ArrayHelper::set($output, "endStr", $model->getEndStr(), [null]);
        ArrayHelper::set($output, "title", $model->getTitle(), [null]);
        ArrayHelper::set($output, "url", $model->getUrl(), [null]);
        ArrayHelper::set($output, "classNames", $model->getClassNames(), [null]);
        ArrayHelper::set($output, "editable", $model->getEditable(), [null]);
        ArrayHelper::set($output, "startEditable", $model->getStartEditable(), [null]);
        ArrayHelper::set($output, "durationEditable", $model->getDurationEditable(), [null]);
        ArrayHelper::set($output, "resourceEditable", $model->getResourceEditable(), [null]);
        ArrayHelper::set($output, "display", $model->getDisplay(), [null]);
        ArrayHelper::set($output, "backgroundColor", $model->getBackgroundColor(), [null]);
        ArrayHelper::set($output, "borderColor", $model->getBorderColor(), [null]);
        ArrayHelper::set($output, "textColor", $model->getTextColor(), [null]);
        ArrayHelper::set($output, "extraParams", $model->getExtraParams());

        return $output;
    }

    /**
     * Serialize an icon.
     *
     * @param IconInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeIcon(IconInterface $model): array {

        return [
            BaseSerializerKeys::NAME  => $model->getName(),
            BaseSerializerKeys::STYLE => $model->getStyle(),
        ];
    }

    /**
     * Serialize a label.
     *
     * @param LabelInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeLabel(LabelInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize a notification.
     *
     * @param NotificationInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeNotification(NotificationInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize a progress bar.
     *
     * @param ProgressBarInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeProgressBar(ProgressBarInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }

    /**
     * Serialize a toast.
     *
     * @param ToastInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeToast(ToastInterface $model): array {

        return [
            BaseSerializerKeys::CONTENT => $model->getContent(),
            BaseSerializerKeys::TYPE    => $model->getType(),
        ];
    }
}
