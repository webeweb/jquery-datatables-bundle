<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Serializer;

use WBW\Bundle\WidgetBundle\Component\AlertInterface;
use WBW\Bundle\WidgetBundle\Component\BadgeInterface;
use WBW\Bundle\WidgetBundle\Component\ButtonInterface;
use WBW\Bundle\WidgetBundle\Component\IconInterface;
use WBW\Bundle\WidgetBundle\Component\LabelInterface;
use WBW\Bundle\WidgetBundle\Component\NotificationInterface;
use WBW\Bundle\WidgetBundle\Component\ProgressBarInterface;
use WBW\Bundle\WidgetBundle\Component\ToastInterface;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;

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
