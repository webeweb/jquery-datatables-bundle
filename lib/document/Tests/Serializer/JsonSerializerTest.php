<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2026 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DocumentBundle\Tests\Serializer;

use DateTime;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Serializer\JsonSerializer;
use WBW\Bundle\DocumentBundle\Serializer\SerializerKeys;
use WBW\Bundle\DocumentBundle\Tests\AbstractTestCase;
use WBW\Library\Common\Serializer\SerializerKeys as BaseSerializerKeys;

/**
 * JSON serializer test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Serializer
 */
class JsonSerializerTest extends AbstractTestCase {

    /**
     * Test serializeDocument()
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testSerializeDocument(): void {

        // Set a children mock.
        $children = $this->getMockBuilder(DocumentInterface::class)->getMock();
        $children->expects($this->any())->method("getChildren")->willReturn(new ArrayCollection());

        // Set a parent mock.
        $parent = $this->getMockBuilder(DocumentInterface::class)->getMock();
        $parent->expects($this->any())->method("getChildren")->willReturn(new ArrayCollection());

        // Set the date/time mocks.
        $createdAt = new DateTime("2021-10-29 11:45:00.00000", new DateTimeZone("UTC"));
        $updatedAt = new DateTime("2021-10-29 12:00:00.00000", new DateTimeZone("UTC"));

        // Set a Document mock.
        $model = $this->getMockBuilder(DocumentInterface::class)->getMock();
        $model->expects($this->any())->method("getId")->willReturn(1);
        $model->expects($this->any())->method("getChildren")->willReturn(new ArrayCollection([$children]));
        $model->expects($this->any())->method("getCreatedAt")->willReturn($createdAt);
        $model->expects($this->any())->method("getExtension")->willReturn(BaseSerializerKeys::EXTENSION);
        $model->expects($this->any())->method("getHashMd5")->willReturn(BaseSerializerKeys::HASH_MD5);
        $model->expects($this->any())->method("getHashSha1")->willReturn(BaseSerializerKeys::HASH_SHA1);
        $model->expects($this->any())->method("getHashSha256")->willReturn(BaseSerializerKeys::HASH_SHA256);
        $model->expects($this->any())->method("getMimeType")->willReturn(BaseSerializerKeys::MIME_TYPE);
        $model->expects($this->any())->method("getName")->willReturn(BaseSerializerKeys::NAME);
        $model->expects($this->any())->method("getNumberDownloads")->willReturn(438);
        $model->expects($this->any())->method("getParent")->willReturn($parent);
        $model->expects($this->any())->method("getSize")->willReturn(4);
        $model->expects($this->any())->method("getType")->willReturn(DocumentInterface::TYPE_DOCUMENT);
        $model->expects($this->any())->method("getUid")->willReturn(BaseSerializerKeys::UID);
        $model->expects($this->any())->method("getUpdatedAt")->willReturn($updatedAt);

        $res = JsonSerializer::serializeDocument($model);
        $this->assertCount(16, $res);

        $this->assertEquals($model->getId(), $res[BaseSerializerKeys::ID]);
        $this->assertIsArray($res[SerializerKeys::CHILDREN]);
        $this->assertEquals($model->getCreatedAt(), $res[BaseSerializerKeys::CREATED_AT]);
        $this->assertEquals($model->getExtension(), $res[BaseSerializerKeys::EXTENSION]);
        $this->assertEquals($model->getHashMd5(), $res[BaseSerializerKeys::HASH_MD5]);
        $this->assertEquals($model->getHashSha1(), $res[BaseSerializerKeys::HASH_SHA1]);
        $this->assertEquals($model->getHashSha256(), $res[BaseSerializerKeys::HASH_SHA256]);
        $this->assertEquals($model->getMimeType(), $res[BaseSerializerKeys::MIME_TYPE]);
        $this->assertEquals($model->getName(), $res[BaseSerializerKeys::NAME]);
        $this->assertEquals($model->getNumberDownloads(), $res[SerializerKeys::NUMBER_DOWNLOADS]);
        $this->assertIsArray($res[BaseSerializerKeys::PARENT]);
        $this->assertEquals($model->getSize(), $res[BaseSerializerKeys::SIZE]);
        $this->assertEquals($model->getType(), $res[BaseSerializerKeys::TYPE]);
        $this->assertEquals($model->getUid(), $res[BaseSerializerKeys::UID]);
        $this->assertEquals($model->getUpdatedAt(), $res[BaseSerializerKeys::UPDATED_AT]);
    }
}
