<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;

/**
 * Abstract document form type.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Form\Type
 * @abstract
 */
abstract class AbstractDocumentFormType extends AbstractType {

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix(): string {
        return WBWDocumentExtension::EXTENSION_ALIAS . "_document";
    }
}
