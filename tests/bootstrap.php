<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
if (true === file_exists($file = __DIR__ . "/autoload.php")) {
    require_once $file;
} else if (true === file_exists($file = __DIR__ . "/autoload.php.dist")) {
    require_once $file;
}