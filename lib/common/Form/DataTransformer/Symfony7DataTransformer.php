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

namespace WBW\Bundle\CommonBundle\Form\DataTransformer;

use Throwable;

/**
 * Symfony 7.x data transformer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Form\DataTransformer
 * @abstract
 */
abstract class Symfony7DataTransformer {

    /**
     * Decode a value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the decoded value.
     * @throws Throwable Throws an exception if an error occurs.
     */
    abstract protected function decode($value);

    /**
     * Encode a value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the encoded value.
     * @throws Throwable Throws an exception if an error occurs.
     */
    abstract protected function encode($value);

    /**
     * Reverse a transformed value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the original value.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function reverseTransform(mixed $value): mixed {
        return $this->decode($value);
    }

    /**
     * Transform a value.
     *
     * @param mixed|null $value The value.
     * @return mixed|null Returns the transformed value.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function transform(mixed $value): mixed {
        return $this->encode($value);
    }
}
