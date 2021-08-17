<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use DeviceDetector\DeviceDetector;
use Symfony\Component\HttpFoundation\Request;

/**
 * DataTables export helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesExportHelper {

    /**
     * Convert.
     *
     * @param array $values The values.
     * @param bool $windows Windows ?
     * @return array Returns the converted values.
     */
    public static function convert(array $values, bool $windows = false): array {

        if (true === $windows) {
            for ($i = count($values) - 1; 0 <= $i; --$i) {
                $values[$i] = utf8_decode($values[$i]);
            }
        }

        return $values;
    }

    /**
     * Determines if the operating system is windows.
     *
     * @param Request $request The request.
     * @return bool Returns true in case of success, false otherwise.
     */
    public static function isWindows(Request $request): bool {

        if (false === $request->headers->has("user-agent")) {
            return false;
        }

        $dd = new DeviceDetector($request->headers->get("user-agent"));
        $dd->parse();

        $os = $dd->getOs("name");

        return 1 === preg_match("/Windows/", $os);
    }
}
