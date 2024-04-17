<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Repository;

use Doctrine\ORM\EntityRepository;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Office;

/**
 * Office repository.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Repository
 * @extends EntityRepository<Office>
 */
class OfficeRepository extends EntityRepository {

}
