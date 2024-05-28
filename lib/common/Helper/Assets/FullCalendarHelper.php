<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Helper\Assets;

use DateTime;
use Symfony\Component\HttpFoundation\Request;

/**
 * Full calendar helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Helper\Assets
 */
class FullCalendarHelper {

    /**
     * Parse a date/time.
     *
     * @param Request $request The request.
     * @param string $key The key.
     * @return DateTime|null Returns the date/time.
     */
    protected static function parseDateTime(Request $request, string $key): ?DateTime {

        $dateTime = DateTime::createFromFormat("Y-m-d\TH:i:sP", $request->query->get($key));

        return false !== $dateTime ? $dateTime : null;
    }

    /**
     * Parse the end date/time.
     *
     * @param Request $request The request.
     * @return DateTime|null Returns the end date/time.
     */
    public static function parseEndDateTime(Request $request): ?DateTime {
        return static::parseDateTime($request, "end");
    }

    /**
     * Parse the start date/time.
     *
     * @param Request $request The request.
     * @return DateTime|null Returns the start date/time.
     */
    public static function parseStartDateTime(Request $request): ?DateTime {
        return static::parseDateTime($request, "start");
    }
}
