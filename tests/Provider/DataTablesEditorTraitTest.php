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

namespace WBW\Bundle\DataTablesBundle\Tests\Provider;

use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider\TestDataTablesEditorTrait;

/**
 * DataTables editor trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Provider
 */
class DataTablesEditorTraitTest extends AbstractTestCase {

    /**
     * Test setEditor()
     *
     * @return void
     */
    public function testSetEditor(): void {

        // Set a DataTables editor mock.
        $editor = $this->getMockBuilder(DataTablesEditorInterface::class)->getMock();

        $obj = new TestDataTablesEditorTrait();

        $obj->setEditor($editor);
        $this->assertSame($editor, $obj->getEditor());
    }
}
