<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Helper;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use WBW\Bundle\DataTablesBundle\Api\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Normalizer\DataTablesNormalizer;
use WBW\Bundle\DataTablesBundle\WBWDataTablesBundle;

/**
 * DataTables wrapper helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Helper
 */
class DataTablesWrapperHelper {

    /**
     * Get a language URL.
     *
     * @param string $language The language.
     * @return string Returns the language URL.
     * @throws FileNotFoundException Throws a file not found exception if the language file does not exist.
     */
    public static function getLanguageUrl(string $language): string {

        // Initialize the directory.
        $dir = (new WBWDataTablesBundle())->getPath();
        $dir .= "/Resources/public/datatables-i18n/%s.json";

        // Initialize the URI.
        $uri = "/bundles/wbwdatatables/datatables-i18n/%s.json";

        // Initialize the URL.
        $url = sprintf($uri, $language);

        // Initialize and check the filename.
        $file = sprintf($dir, $language);
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
    public static function getName(DataTablesWrapperInterface $dtWrapper): string {
        return "dt" . preg_replace("/[^A-Za-z0-9]/", "", $dtWrapper->getProvider()->getName());
    }

    /**
     * Get the options.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return array<string,mixed> Returns the options.
     */
    public static function getOptions(DataTablesWrapperInterface $dtWrapper): array {

        $output = [];

        if (null !== $dtWrapper->getOptions()) {
            $output = $dtWrapper->getOptions()->getOptions();
        }

        $output["ajax"]["type"] = $dtWrapper->getMethod();
        $output["ajax"]["url"]  = $dtWrapper->getUrl();
        $output["columns"]      = [];
        $output["processing"]   = $dtWrapper->getProcessing();
        $output["serverSide"]   = $dtWrapper->getServerSide();

        foreach ($dtWrapper->getColumns() as $current) {
            $output["columns"][] = DataTablesNormalizer::normalizeColumn($current);
        }

        return $output;
    }

    /**
     * Determine if a wrapper contains a search.
     *
     * @param DataTablesWrapperInterface $dtWrapper The wrapper.
     * @return bool Returns true in case of success, false otherwise.
     */
    public static function hasSearch(DataTablesWrapperInterface $dtWrapper): bool {
        return null !== DataTablesRepositoryHelper::determineOperator($dtWrapper);
    }
}
