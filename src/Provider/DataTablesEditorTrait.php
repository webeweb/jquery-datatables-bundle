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

namespace WBW\Bundle\DataTablesBundle\Provider;

/**
 * DataTables editor trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
trait DataTablesEditorTrait {

    /**
     * Editor.
     *
     * @var DataTablesEditorInterface|null
     */
    protected $editor;

    /**
     * Get the editor.
     *
     * @return DataTablesEditorInterface|null Returns the editor.
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return $this->editor;
    }

    /**
     * Set the editor.
     *
     * @param DataTablesEditorInterface|null $editor The editor.
     * @return self Returns this instance.
     */
    protected function setEditor(?DataTablesEditorInterface $editor): self {
        $this->editor = $editor;
        return $this;
    }
}
