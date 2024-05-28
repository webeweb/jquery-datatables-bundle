<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Form\DataTransformer;

use Symfony\Component\HttpKernel\Kernel;

// TODO: Remove when dropping support for Symfony 6
if (Kernel::VERSION_ID < 70000) {
    class_alias("WBW\Bundle\CommonBundle\Form\DataTransformer\Symfony6DataTransformer", "WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractDataTransformer");
} else {
    class_alias("WBW\Bundle\CommonBundle\Form\DataTransformer\Symfony7DataTransformer", "WBW\Bundle\CommonBundle\Form\DataTransformer\AbstractDataTransformer");
}
