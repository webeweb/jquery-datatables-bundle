<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Serializer;

use WBW\Bundle\WidgetBundle\Assets\FullCalendar\FullCalendarEventInterface;
use WBW\Bundle\WidgetBundle\Assets\Select2\Select2OptionInterface;
use WBW\Library\Serializer\SerializerKeys as BaseSerializerKeys;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * Assets serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Serializer
 */
class AssetsSerializer {

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
     * Serialize a Select2 option.
     *
     * @param Select2OptionInterface $model The model.
     * @return array<string,mixed> Returns the serialized model.
     */
    public static function serializeSelect2Option(Select2OptionInterface $model): array {

        return [
            BaseSerializerKeys::ID   => $model->getSelect2OptionId(),
            BaseSerializerKeys::TEXT => $model->getSelect2OptionText(),
        ];
    }
}
