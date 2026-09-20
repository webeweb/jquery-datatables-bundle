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

namespace WBW\Bundle\DocumentBundle\Tests\Form\Type;

use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\Form\Type\TestFormType;

/**
 * Abstract form type test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Form\Type
 */
class AbstractFormTypeTest extends AbstractTestCase {

    /**
     * Test getBlockPrefix()
     *
     * @return void.
     */
    public function testGetBlockPrefix(): void {

        $obj = new TestFormType();

        $this->assertEquals("wbw_document_document", $obj->getBlockPrefix());
    }
}
