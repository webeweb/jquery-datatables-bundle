<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Helper;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapper;
use WBW\Bundle\JQuery\DataTablesBundle\JQueryDataTablesBundle;
use WBW\Library\Core\Argument\ObjectHelper;
use WBW\Library\Core\Argument\StringHelper;
use WBW\Library\Core\Exception\FileSystem\FileNotFoundException;

/**
 * DataTables wrapper helper.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Helper
 */
class DataTablesWrapperHelper {

    /**
     * Get a language URL.
     *
     * @param string $language The language.
     * @return string Returns the language URL.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public static function getLanguageURL($language) {

        // Initialize the directory.
        $dir = ObjectHelper::getDirectory(JQueryDataTablesBundle::class);
        $dir .= "/Resources/public/datatables-i18n-%version%/%language%.json";

        // Initialize the URI.
        $uri = "/bundles/jquerydatatables/datatables-i18n-%version%/%language%.json";

        // Initialize the URL.
        $url = StringHelper::replace($uri, ["%version%", "%language%"], [JQueryDataTablesBundle::DATATABLES_VERSION, $language]);

        // Initialize and check the filename.
        $file = StringHelper::replace($dir, ["%version%", "%language%"], [JQueryDataTablesBundle::DATATABLES_VERSION, $language]);
        if (false === file_exists($file)) {
            throw new FileNotFoundException($url);
        }

        // Return the URL.
        return $url;
    }

    /**
     * Get a name.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return string Returns the name.
     */
    public static function getName(DataTablesWrapper $dtWrapper) {
        return "dt" . preg_replace("/[^A-Za-z0-9]/", "", $dtWrapper->getName());
    }

    /**
     * Get a options.
     *
     * @param DataTablesWrapper $dtWrapper The wrapper.
     * @return array Returns the options.
     */
    public static function getOptions(DataTablesWrapper $dtWrapper) {

        // Initialize the output.
        $output = [];

        // Check the options.
        if (null !== $dtWrapper->getOptions()) {
            $output = $dtWrapper->getOptions()->getOptions();
        }

        // Set the options.
        $output["ajax"]         = [];
        $output["ajax"]["type"] = $dtWrapper->getMethod();
        $output["ajax"]["url"]  = $dtWrapper->getUrl();
        $output["columns"]      = [];
        $output["order"]        = [];
        $output["processing"]   = $dtWrapper->getProcessing();
        $output["serverSide"]   = $dtWrapper->getServerSide();

        // Handle each column.
        foreach ($dtWrapper->getColumns() as $current) {
            $output["columns"][] = $current->toArray();
        }

        // Handle each order.
        foreach ($dtWrapper->getOrder() as $current) {
            $output["order"][] = $current->toArray();
        }

        // Return the output.
        return $output;
    }

}
