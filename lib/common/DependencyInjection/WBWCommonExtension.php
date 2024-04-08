<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\DependencyInjection;

use Symfony\Component\Yaml\Yaml;

/**
 * Common extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\DependencyInjection
 */
class WBWCommonExtension {

    /**
     * Load a YAML configuration.
     *
     * @param string $path The path.
     * @param string $file The file.
     * @return array<string,mixed> Returns the YAML configuration.
     */
    public static function loadYamlConfig(string $path, string $file): array {

        $filename = realpath("$path/$file.yml");
        if (false === $filename) {
            return [];
        }

        $input = file_get_contents($filename);

        return Yaml::parse($input);
    }
}
