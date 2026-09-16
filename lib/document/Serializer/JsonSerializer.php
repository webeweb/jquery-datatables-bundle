<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2026 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DocumentBundle\Serializer;

use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Library\Common\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON serializer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Serializer
 */
class JsonSerializer {

    /**
     * Serialize a document.
     *
     * @param DocumentInterface $document The document.
     * @return array<string,mixed> Returns a serialized document
     */
    public static function serializeDocument(DocumentInterface $document): array {

        $children = [];
        $parent   = null;

        /** @var DocumentInterface $current */
        foreach ($document->getChildren() as $current) {
            $children[] = $current->getId();
        }

        if (null !== $document->getParent()) {
            $parent = static::serializeDocument($document->getParent());
        }

        return [
            BaseSerializerKeys::ID           => $document->getId(),
            SerializerKeys::CHILDREN         => $children,
            BaseSerializerKeys::CREATED_AT   => $document->getCreatedAt(),
            BaseSerializerKeys::EXTENSION    => $document->getExtension(),
            BaseSerializerKeys::FILENAME     => DocumentHelper::getFilename($document),
            BaseSerializerKeys::HASH_MD5     => $document->getHashMd5(),
            BaseSerializerKeys::HASH_SHA1    => $document->getHashSha1(),
            BaseSerializerKeys::HASH_SHA256  => $document->getHashSha256(),
            BaseSerializerKeys::MIME_TYPE    => $document->getMimeType(),
            BaseSerializerKeys::NAME         => $document->getName(),
            SerializerKeys::NUMBER_DOWNLOADS => $document->getNumberDownloads(),
            BaseSerializerKeys::PARENT       => $parent,
            BaseSerializerKeys::SIZE         => $document->getSize(),
            BaseSerializerKeys::TYPE         => $document->getType(),
            BaseSerializerKeys::UID          => $document->getUid(),
            BaseSerializerKeys::UPDATED_AT   => $document->getUpdatedAt(),
        ];
    }
}
