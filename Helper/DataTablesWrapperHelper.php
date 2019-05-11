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

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperInterface;
use WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle;
use WBW\Bundle\JQuery\DataTablesBundle\Normalizer\DataTablesNormalizer;
use WBW\Library\Core\Argument\ObjectHelper;
use WBW\Library\Core\Argument\StringHelper;

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
        $dir = ObjectHelper::getDirectory(WBWJQueryDataTablesBundle::class);
        $dir .= "/Resources/public/datatables-i18n/%language%.json";

        // Initialize the URI.
        $uri = "/bundles/wbwjquerydatatables/datatables-i18n/%language%.json";

        // Initialize the URL.
        $url = StringHelper::replace($uri, ["%language%"], [$language]);

        // Initialize and check the filename.
        $file = StringHelper::replace($dir, ["%language%"], [$language]);
        if (false === file_exists($file)) {
            throw new FileNotFoundException(null, 500, null, $url);
        }

        return $url;
    }

    /**
     * Get a name.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return string Returns the name.
     */
    public static function getName(DataTablesWrapperInterface $dtWrapper) {
        return "dt" . preg_replace("/[^A-Za-z0-9]/", "", $dtWrapper->getProvider()->getName());
    }

    /**
     * Get the options.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return array Returns the options.
     */
    public static function getOptions(DataTablesWrapperInterface $dtWrapper) {

        $output = [];

        if (null !== $dtWrapper->getOptions()) {
            $output = $dtWrapper->getOptions()->getOptions();
        }

        $output["ajax"]         = [];
        $output["ajax"]["type"] = $dtWrapper->getMethod();
        $output["ajax"]["url"]  = $dtWrapper->getUrl();
        $output["columns"]      = [];
        $output["order"]        = $dtWrapper->getOrder();
        $output["processing"]   = $dtWrapper->getProcessing();
        $output["serverSide"]   = $dtWrapper->getServerSide();

        foreach ($dtWrapper->getColumns() as $current) {
            $output["columns"][] = DataTablesNormalizer::normalizeColumn($current);
        }

        return $output;
    }
}
