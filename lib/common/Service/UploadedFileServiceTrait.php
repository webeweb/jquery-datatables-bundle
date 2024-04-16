<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-library package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Service;

/**
 * Uploaded file service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Service
 */
trait UploadedFileServiceTrait {

    /**
     * Uploaded file service.
     *
     * @var UploadedFileServiceInterface|null
     */
    private $uploadedFileService;

    /**
     * Get the uploaded file service.
     *
     * @return UploadedFileServiceInterface|null Returns the uploaded file service.
     */
    public function getUploadedFileService(): ?UploadedFileServiceInterface {
        return $this->uploadedFileService;
    }

    /**
     * Set the uploaded file service.
     *
     * @param UploadedFileServiceInterface|null $uploadedFileService The uploaded file service.
     * @return self Returns this instance.
     */
    protected function setUploadedFileService(?UploadedFileServiceInterface $uploadedFileService): self {
        $this->uploadedFileService = $uploadedFileService;
        return $this;
    }
}
