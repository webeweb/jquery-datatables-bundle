<?php

/*
 * This file is part of the edm-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests;

use DirectoryIterator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Throwable;
use WBW\Bundle\CommonBundle\Tests\DefaultWebTestCase as BaseWebTestCase;
use WBW\Bundle\DocumentBundle\Manager\StorageManager;
use WBW\Bundle\DocumentBundle\Provider\Storage\FilesystemStorageProvider;
use WBW\Bundle\DocumentBundle\Tests\Fixtures\TestFixtures;

/**
 * Abstract web test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests
 * @abstract
 */
abstract class AbstractWebTestCase extends BaseWebTestCase {

    /**
     * {@inheritDoc}
     */
    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        /** @var FilesystemStorageProvider $fs */
        $fs = static::$kernel->getContainer()->get(FilesystemStorageProvider::SERVICE_NAME);

        foreach (new DirectoryIterator($fs->getDirectory()) as $current) {

            if (1 === preg_match("/^[0-9]{1,}(\.download)?$/", $current->getFilename())) {
                (new Filesystem())->remove($current->getPathname());
            }
        }
    }

    /**
     * Set up the documents entities.
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected static function setUpDocumentsEntities(): void {

        /** @var EntityManagerInterface $em */
        $em = static::$kernel->getContainer()->get("doctrine.orm.entity_manager");

        $entities = TestFixtures::getDocuments();
        foreach ($entities as $current) {
            $em->persist($current);
        }

        $em->flush();

        /** @var StorageManager $sm */
        $sm = static::$kernel->getContainer()->get(StorageManager::SERVICE_NAME . ".alias");

        foreach ($entities as $current) {
            $sm->newDirectory($current);
        }
    }
}
