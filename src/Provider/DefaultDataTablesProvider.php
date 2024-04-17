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

namespace WBW\Bundle\DataTablesBundle\Provider;

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesEntityHelper;
use WBW\Bundle\DataTablesBundle\Helper\DataTablesWrapperHelper;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;

/**
 * Default DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 * @abstract
 */
abstract class DefaultDataTablesProvider implements DataTablesProviderInterface {

    use TranslatorTrait;

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator The translator.
     */
    public function __construct(TranslatorInterface $translator) {
        $this->setTranslator($translator);
    }

    /**
     * {@inheritDoc}
     */
    public function getCsvExporter(): ?DataTablesCsvExporterInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): ?string {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): DataTablesOptionsInterface {

        $url = ["url" => DataTablesWrapperHelper::getLanguageURL("French")];

        $dtOptions = DataTablesFactory::newOptions();
        $dtOptions->addOption("language", $url);
        $dtOptions->addOption("order", [[0, "asc"]]);
        $dtOptions->addOption("responsive", true);
        $dtOptions->addOption("search", ["return" => true]);

        $dtOptions->addOption("columnDefs", [
            [
                "responsivePriority" => 1,
                "targets"            => -1,
            ],
        ]);

        return $dtOptions;
    }

    /**
     * {@inheritDoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        DataTablesEntityHelper::isCompatible($entity, true);

        switch ($dtRow) {

            case DataTablesResponseInterface::DATATABLES_ROW_DATA:
                return [
                    "id"   => $entity->getId(),
                    "name" => $this->getName(),
                ];

            case DataTablesResponseInterface::DATATABLES_ROW_ID:
                return implode("_", [$this->getName(), $entity->getId()]);
        }

        return null;
    }
}
