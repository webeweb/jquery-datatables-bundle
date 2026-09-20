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

namespace WBW\Bundle\DocumentBundle\DataTables\Provider;

use WBW\Bundle\CommonBundle\Twig\Extension\AbstractTwigExtension;
use WBW\Bundle\DataTablesBundle\Provider\BootstrapDataTablesProvider as BaseDataTablesProvider;
use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\MimeTypeIconProviderTrait;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;
use WBW\Library\Common\Helper\StringHelper;
use WBW\Library\Widget\Renderer\Component\ImageRendererTrait;

/**
 * Abstract DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider\DataTables
 */
abstract class AbstractDataTablesProvider extends BaseDataTablesProvider {

    use MimeTypeIconProviderTrait {
        setMimeTypeIconProvider as public;
    }
    use ImageRendererTrait;

    /**
     * Render an action button.
     *
     * @param DocumentInterface $document The document.
     * @param string $route The route.
     * @param string $icon The icon.
     * @param string $label The label.
     * @param string $type The type.
     * @return string Returns the rendered action button.
     */
    private function renderActionButton(DocumentInterface $document, string $route, string $icon, string $label, string $type): string {

        $method = sprintf("bootstrapButton%sFunction", $type);

        $title  = $this->translate($label);
        $button = $this->getButtonTwigExtension()->$method(["icon" => $icon, "title" => $title, "size" => "xs"]);
        $href   = $this->getRouter()->generate($route, ["id" => $document->getId()]);

        return $this->getButtonTwigExtension()->bootstrapButtonLinkFilter($button, $href);
    }

    /**
     * Render an action button "download".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered action button "download".
     */
    protected function renderActionButtonDownload(DocumentInterface $document): string {
        return $this->renderActionButton($document, "wbw_document_document_download", "fa:download", "label.download", "Info");
    }

    /**
     * Render an action button "index".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered action button "index".
     */
    protected function renderActionButtonIndex(DocumentInterface $document): string {
        return $this->renderActionButton($document, "wbw_document_document_index", "fa:folder-open", "label.index", "Primary");
    }

    /**
     * Render an action button "move".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered action button "move".
     */
    protected function renderActionButtonMove(DocumentInterface $document): string {
        return $this->renderActionButton($document, "wbw_document_document_move", "fa:arrows-alt", "label.move", "Default");
    }

    /**
     * Render an action button "upload".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered action button "upload".
     */
    protected function renderActionButtonUpload(DocumentInterface $document): string {
        return $this->renderActionButton($document, "wbw_document_dropzone_upload", "fa:upload", "label.upload", "Success");
    }

    /**
     * Render a column "actions".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "actions".
     */
    protected function renderColumnActions(DocumentInterface $document): string {

        $anchors = [
            $this->renderActionButtonEdit($document, "wbw_document_document_edit"),
            $this->renderActionButtonDelete($document, "wbw_document_document_delete"),
            $this->renderActionButtonDownload($document),
            $this->renderActionButtonMove($document),
        ];

        if (true === $document->isDirectory()) {
            $anchors[] = $this->renderActionButtonIndex($document);
            $anchors[] = $this->renderActionButtonUpload($document);
        }

        return implode(" ", $anchors);
    }

    /**
     * Render a column "icon".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "icon".
     */
    protected function renderColumnIcon(DocumentInterface $document): string {

        $output = $this->renderImage($this->getMimeTypeIconProvider()->getIconAsset($document), null, null, "32px");

        return AbstractTwigExtension::h("span", $output, ["class" => "pull-left"]);
    }

    /**
     * Render a column "name".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "name".
     */
    protected function renderColumnName(DocumentInterface $document): string {

        $output = [
            DocumentHelper::getFilename($document),
        ];

        if (true === $document->isDirectory()) {
            $content  = $this->translate("label.items_count", ["{{ count }}" => count($document->getChildren())]);
            $output[] = AbstractTwigExtension::h("span", $content, ["class" => "font-italic"]);
        }

        $icon = $this->renderColumnIcon($document);
        $name = implode("<br/>", $output);

        return "$icon$name";
    }

    /**
     * Render a column "size".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "size".
     */
    protected function renderColumnSize(DocumentInterface $document): string {

        $output = StringHelper::fileSize($document->getSize());

        return AbstractTwigExtension::h("span", $output, ["class" => "pull-right"]);
    }

    /**
     * Render a column "type".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "type".
     */
    protected function renderColumnType(DocumentInterface $document): string {

        if (true === $document->isDirectory()) {
            return $this->translate("label.directory");
        }

        return $document->getMimeType();
    }

    /**
     * Render a column "updated at".
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the rendered column "updated at".
     */
    protected function renderColumnUpdatedAt(DocumentInterface $document): string {

        if (null !== $document->getUpdatedAt()) {
            return $this->renderDateTime($document->getUpdatedAt());
        }

        return $this->renderDateTime($document->getCreatedAt());
    }

    /**
     * {@inheritDoc}
     */
    protected function translate(?string $id, array $parameters = [], string $domain = null, string $locale = null): string {

        if (null === $domain) {
            $domain = WBWDocumentBundle::getTranslationDomain();
        }

        return parent::translate($id, $parameters, $domain, $locale);
    }
}
