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

namespace WBW\Bundle\DocumentBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Throwable;
use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperInterface;
use WBW\Bundle\DataTablesBundle\Repository\DefaultDataTablesRepository;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;

/**
 * Document repository.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Repository
 */
class DocumentRepository extends DefaultDataTablesRepository {

    /**
     * Append WHERE parent.
     *
     * @param DataTablesWrapperInterface $dtWrapper The DataTables wrapper.
     * @param QueryBuilder $qb The query builder.
     * @return QueryBuilder Returns the query builder.
     */
    protected function appendWhereParent(DataTablesWrapperInterface $dtWrapper, QueryBuilder $qb): QueryBuilder {

        $prefix = $dtWrapper->getProvider()->getPrefix();
        $parent = $dtWrapper->getRequest()->getQuery()->get("id");

        $qb->leftJoin(sprintf("%s.parent", $prefix), "p");

        if (null === $parent) {
            $qb->andWhere("($prefix.parent IS NULL)");
        } else {
            $qb->andWhere("($prefix.parent = :parent)")
                ->setParameter(":parent", $parent);
        }

        return $qb;
    }

    /**
     * {@inheritDoc}
     */
    protected function dataTablesCountFilteredQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        $qb = parent::dataTablesCountFilteredQueryBuilder($dtWrapper);
        return $this->appendWhereParent($dtWrapper, $qb);
    }

    /**
     * {@inheritDoc}
     */
    protected function dataTablesCountTotalQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        $qb = parent::dataTablesCountTotalQueryBuilder($dtWrapper);
        return $this->appendWhereParent($dtWrapper, $qb);
    }

    /**
     * {@inheritDoc}
     */
    protected function dataTablesFindAllQueryBuilder(DataTablesWrapperInterface $dtWrapper): QueryBuilder {
        $qb = parent::dataTablesFindAllQueryBuilder($dtWrapper);
        return $this->appendWhereParent($dtWrapper, $qb);
    }

    /**
     * Find all by parent.
     *
     * @param DocumentInterface|null $parent The parent.
     * @return DocumentInterface[] Returns the documents.
     */
    public function findAllByParent(?DocumentInterface $parent): array {

        $qb = $this->createQueryBuilder("d");
        $qb->leftJoin("d.parent", "p")
            ->addSelect("p")
            ->leftJoin("d.children", "c")
            ->addSelect("c")
            ->orderBy("d.name", "ASC");

        if (null !== $parent) {
            $qb->andWhere("d.parent = :parent")
                ->setParameter(":parent", $parent);
        } else {
            $qb->andWhere("d.parent IS NULL");
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Find all directories.
     *
     * @param DocumentInterface|null $exclude The excluded directory.
     * @return DocumentInterface[] Returns the directories.
     */
    public function findAllDirectoriesExcept(?DocumentInterface $exclude): array {

        $qb = $this->createQueryBuilder("d");
        $qb->leftJoin("d.parent", "p")
            ->addSelect("p")
            ->leftJoin("d.children", "c")
            ->addSelect("c")
            ->andWhere("d.type = :type")
            ->setParameter(":type", DocumentInterface::TYPE_DIRECTORY)
            ->orderBy("d.name", "ASC");

        if (null !== $exclude) {
            $qb->andWhere("d.id <> :id")
                ->setParameter("id", $exclude);
        }

        return $this->removeOrphans($qb->getQuery()->getResult());
    }

    /**
     * Find all documents by parent.
     *
     * @param DocumentInterface|null $parent The directory.
     * @return DocumentInterface[] Returns the document.
     */
    public function findAllDocumentsByParent(?DocumentInterface $parent): array {

        $qb = $this->createQueryBuilder("d");
        $qb->leftJoin("d.parent", "p")
            ->addSelect("p")
            ->leftJoin("d.children", "c")
            ->addSelect("c")
            ->andWhere("d.type = :type")
            ->setParameter(":type", DocumentInterface::TYPE_DOCUMENT)
            ->orderBy("d.name", "ASC");

        if (null === $parent) {
            $qb->andWhere("d.parent IS NULL");
        } else {
            $qb->andWhere("d.parent = :parent")
                ->setParameter("parent", $parent);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Find one by id.
     *
     * @param int|null $id The id.
     * @return Document|null Returns the document.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function findOneById(?int $id): ?Document {

        if (null === $id) {
            return null;
        }

        $qb = $this->createQueryBuilder("d");
        $qb->leftJoin("d.parent", "p")
            ->addSelect("p")
            ->leftJoin("d.children", "c")
            ->addSelect("c")
            ->andWhere("d.id = :id")
            ->setParameter(":id", $id)
            ->orderBy("d.name", "ASC");

        return $qb->getQuery()->getOneOrNullResult();
    }

    /**
     * Remove orphans.
     *
     * @param DocumentInterface[] $documents The documents.
     * @return DocumentInterface[] Returns the documents.
     */
    private function removeOrphans(array $documents): array {

        $ids = [];

        foreach ($documents as $current) {
            $ids[] = $current->getId();
        }

        foreach ($documents as $k => $v) {
            if (null === $v->getParent() || true === in_array($v->getParent()->getId(), $ids)) {
                continue;
            }
            unset($documents[$k]);
        }

        return $documents;
    }
}
