<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\CommonBundle\Twig\Extension\AbstractTwigExtension;

/**
 * Test abstract Twig extension.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Twi\Extension
 */
class TestAbstractTwigExtension extends AbstractTwigExtension {

    /**
     * Constructor.
     *
     * @param Environment $twigEnvironment The Twig environment.
     */
    public function __construct(Environment $twigEnvironment) {
        parent::__construct($twigEnvironment);
    }
}
