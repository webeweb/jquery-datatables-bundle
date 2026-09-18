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

namespace WBW\Bundle\DocumentBundle\Form\Type\Document;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Form\Type\AbstractDocumentFormType;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;

/**
 * New directory form type.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Form\Type\Document
 */
class NewDirectoryFormType extends AbstractDocumentFormType {

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void {

        $disabled = $options["disabled"];

        $builder
            ->add("name", TextType::class, [
                "disabled" => $disabled,
                "label"    => "label.name",
                "required" => false,
                "trim"     => true,
            ]);
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            "data_class"         => Document::class,
            "translation_domain" => WBWDocumentBundle::getTranslationDomain(),
            "validation_groups"  => "new",
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix(): string {
        return WBWDocumentExtension::EXTENSION_ALIAS . "_new_directory";
    }
}
