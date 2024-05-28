<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Twig\Extension;

/**
 * String Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Twig\Extension
 */
trait StringTwigExtensionTrait {

    /**
     * String Twig extension.
     *
     * @var StringTwigExtension|null
     */
    private $stringTwigExtension;

    /**
     * Get the string Twig extension.
     *
     * @return StringTwigExtension|null Returns the string Twig extension.
     */
    public function getStringTwigExtension(): ?StringTwigExtension {
        return $this->stringTwigExtension;
    }

    /**
     * Set the string Twig extension.
     *
     * @param StringTwigExtension|null $stringTwigExtension The string Twig extension.
     * @return self Returns this instance.
     */
    protected function setStringTwigExtension(?StringTwigExtension $stringTwigExtension): self {
        $this->stringTwigExtension = $stringTwigExtension;
        return $this;
    }
}
