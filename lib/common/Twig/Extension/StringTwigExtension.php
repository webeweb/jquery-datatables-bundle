<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Twig\Extension;

use DateTime;
use RuntimeException;
use Throwable;
use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Library\Common\Helper\DateTimeHelper;
use WBW\Library\Common\Helper\StringHelper;

/**
 * String Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
class StringTwigExtension extends AbstractTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.twig.extension.string";

    /**
     * Format a date/time.
     *
     * @param DateTime|null $dateTime The date/time.
     * @param string $format The format.
     * @return string|null Returns the formatted date/time.
     */
    public function dateFormat(?DateTime $dateTime, string $format = DateTimeHelper::DATETIME_FORMAT): ?string {
        return DateTimeHelper::toString($dateTime, $format);
    }

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters(): array {

        return [
            new TwigFilter("dateFormat", [$this, "dateFormat"], ["is_safe" => ["html"]]),

            new TwigFilter("htmlEntityDecode", [$this, "htmlEntityDecode"], ["is_safe" => ["html"]]),
            new TwigFilter("htmlEntityEncode", [$this, "htmlEntityEncode"], ["is_safe" => ["html"]]),

            new TwigFilter("jsonDecode", [$this, "jsonDecode"], ["is_safe" => ["html"]]),

            new TwigFilter("md5", [$this, "md5"], ["is_safe" => ["html"]]),

            new TwigFilter("stringExtractUpperCase", [$this, "stringExtractUpperCase"], ["is_safe" => ["html"]]),
            new TwigFilter("stringFormat", [$this, "stringFormat"], ["is_safe" => ["html"]]),
            new TwigFilter("stringHumanReadable", [$this, "stringHumanReadable"], ["is_safe" => ["html"]]),
            new TwigFilter("stringLowerCamelCase", [$this, "stringLowerCamelCase"], ["is_safe" => ["html"]]),
            new TwigFilter("stringSnakeCase", [$this, "stringSnakeCase"], ["is_safe" => ["html"]]),
            new TwigFilter("stringUpperCamelCase", [$this, "stringUpperCamelCase"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions(): array {

        return [
            new TwigFunction("dateFormat", [$this, "dateFormat"], ["is_safe" => ["html"]]),

            new TwigFunction("htmlEntityDecode", [$this, "htmlEntityDecode"], ["is_safe" => ["html"]]),
            new TwigFunction("htmlEntityEncode", [$this, "htmlEntityEncode"], ["is_safe" => ["html"]]),

            new TwigFunction("jsonDecode", [$this, "jsonDecode"], ["is_safe" => ["html"]]),

            new TwigFunction("md5", [$this, "md5"], ["is_safe" => ["html"]]),

            new TwigFunction("stringExtractUpperCase", [$this, "stringExtractUpperCase"], ["is_safe" => ["html"]]),
            new TwigFunction("stringFormat", [$this, "stringFormat"], ["is_safe" => ["html"]]),
            new TwigFunction("stringHumanReadable", [$this, "stringHumanReadable"], ["is_safe" => ["html"]]),
            new TwigFunction("stringLowerCamelCase", [$this, "stringLowerCamelCase"], ["is_safe" => ["html"]]),
            new TwigFunction("stringSnakeCase", [$this, "stringSnakeCase"], ["is_safe" => ["html"]]),
            new TwigFunction("stringUniqId", [$this, "stringUniqIdFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("stringUpperCamelCase", [$this, "stringUpperCamelCase"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Decode HTML entities.
     *
     * @param string|null $string The string.
     * @return string|null Returns the decoded HTML entities.
     */
    public function htmlEntityDecode(?string $string): ?string {

        if (null === $string) {
            return null;
        }

        return html_entity_decode($string);
    }

    /**
     * Encode HTML entities.
     *
     * @param string|null $string The string.
     * @return string|null Returns the encoded HTML entities.
     */
    public function htmlEntityEncode(?string $string): ?string {

        if (null === $string) {
            return null;
        }

        return htmlentities($string);
    }

    /**
     * Decode a JSON string.
     *
     * @param string|null $string The string.
     * @return array<string,mixed>|null Returns the decoded JSON string.
     */
    public function jsonDecode(?string $string): ?array {

        if (null === $string) {
            return null;
        }

        return json_decode($string, true);
    }

    /**
     * MD5.
     *
     * @param string|null $string The string.
     * @return string|null Returns the MD5.
     */
    public function md5(?string $string): ?string {

        if (null === $string) {
            return null;
        }

        return md5($string);
    }

    /**
     * Display the extracted upper case letters.
     *
     * @param string|null $str The string.
     * @param bool $lower Lower case ?
     * @return string|null Returns the extracted upper case letters.
     */
    public function stringExtractUpperCase(?string $str, bool $lower = false): ?string {
        return StringHelper::extractUpperCase($str, $lower);
    }

    /**
     * Display a formatted string.
     *
     * @param string|null $string The string.
     * @param string|null $format The format.
     * @return string|null Returns the formatted string.
     */
    public function stringFormat(?string $string, ?string $format): ?string {
        return StringHelper::format($string, $format);
    }

    /**
     * Display an human-readable string.
     *
     * @param string|null $str The string.
     * @return string|null Returns the human-readable string.
     */
    public function stringHumanReadable(?string $str): ?string {
        return StringHelper::toHumanReadable($str);
    }

    /**
     * Display a lower camel case string.
     *
     * @param string|null $str The string.
     * @return string|null Returns the lower camel case string.
     */
    public function stringLowerCamelCase(?string $str): ?string {
        return StringHelper::toLowerCamelCase($str);
    }

    /**
     * Display a snake case string.
     *
     * @param string|null $str The string.
     * @param string $sep The separator.
     * @return string|null Returns the snake case.
     */
    public function stringSnakeCase(?string $str, string $sep = "_"): ?string {
        return StringHelper::toSnakeCase($str, $sep);
    }

    /**
     * Display a unique id.
     *
     * @param int $length The length.
     * @return string|null Returns the unique id.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function stringUniqIdFunction(int $length = 13): ?string {

        if ($length < 1) {
            return null;
        }

        if (true === function_exists("random_bytes")) {
            $bytes = random_bytes((int) ceil($length / 2));
        } else if (true === function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes((int) ceil($length / 2));
        } else {
            throw new RuntimeException("random_bytes() and openssl_random_pseudo_bytes() are not available");
        }

        $hex = bin2hex($bytes);

        return substr($hex, 0, $length);
    }

    /**
     * Display an upper camel case string.
     *
     * @param string|null $str The string.
     * @return string|null Returns the upper camel case string.
     */
    public function stringUpperCamelCase(?string $str): ?string {
        return StringHelper::toUpperCamelCase($str);
    }
}
