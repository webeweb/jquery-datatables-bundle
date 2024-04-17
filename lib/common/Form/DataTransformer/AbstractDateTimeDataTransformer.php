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

namespace WBW\Bundle\CommonBundle\Form\DataTransformer;

use DateTime;
use DateTimeZone;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Abstract date time data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer
 * @abstract
 */
abstract class AbstractDateTimeDataTransformer implements DataTransformerInterface {

    /**
     * Format.
     *
     * @var string|null
     */
    private $format;

    /**
     * Timezone.
     *
     * @var string|null
     */
    private $timezone;

    /**
     * Constructor.
     *
     * @param string $format The format.
     * @param string|null $timeZone The timezone.
     */
    protected function __construct(string $format, ?string $timeZone = null) {
        $this->setFormat($format);
        $this->setTimezone($timeZone);
    }

    /**
     * Get the format.
     *
     * @return string Returns the format.
     */
    public function getFormat(): string {
        return $this->format;
    }

    /**
     * Get the timezone.
     *
     * @return string|null Returns the timezone.
     */
    public function getTimezone(): ?string {
        return $this->timezone;
    }

    /**
     * Create the date/timezone.
     *
     * @return DateTimeZone|null Returns the date/timezone.
     */
    protected function newDateTimeZone(): ?DateTimeZone {

        if (null === $this->getTimezone()) {
            return null;
        }

        return new DateTimeZone($this->getTimezone());
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($value) {

        if (null === $value || "" === $value) {
            return null;
        }

        $zone = $this->newDateTimeZone();

        $date = DateTime::createFromFormat($this->getFormat(), $value, $zone);
        if (false === $date) {
            return null;
        }

        return $date;
    }

    /**
     * Set the format.
     *
     * @param string $format The format.
     * @return AbstractDateTimeDataTransformer Returns this date/time data transformer.
     */
    public function setFormat(string $format): AbstractDateTimeDataTransformer {
        $this->format = $format;
        return $this;
    }

    /**
     * Set the timezone.
     *
     * @param string|null $timezone The timezone.
     * @return AbstractDateTimeDataTransformer Returns this date/time data transformer.
     */
    public function setTimezone(?string $timezone): AbstractDateTimeDataTransformer {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function transform($value) {

        if (false === ($value instanceof DateTime)) {
            return null;
        }

        $zone = $this->newDateTimeZone();
        if (null !== $zone) {
            $value->setTimezone($zone);
        }

        return $value->format($this->getFormat());
    }
}
