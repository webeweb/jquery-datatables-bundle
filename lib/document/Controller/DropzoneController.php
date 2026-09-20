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

namespace WBW\Bundle\DocumentBundle\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Controller\ReadDataTablesController;
use WBW\Bundle\DocumentBundle\DataTables\Provider\DocumentDataTablesProvider;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Event\DocumentEvent;
use WBW\Bundle\DocumentBundle\Form\Type\Document\UploadDocumentFormType;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Repository\DocumentRepository;

/**
 * Dropzone controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Controller
 */
class DropzoneController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.document.controller.dropzone";

    /**
     * Indexes a directory.
     *
     * @param int|null $id The directory.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function indexAction(int $id = null): Response {

        /** @var DocumentRepository $repository */
        $repository = $this->getEntityManager()->getRepository(Document::class);

        $directory = $repository->findOneById($id);
        $entities  = $repository->findAllDocumentsByParent($directory);

        return new JsonResponse($entities);
    }

    /**
     * Serialize an existing document.
     *
     * @param int $id The document.
     * @return Response Returns the response.
     */
    public function serializeAction(int $id): Response {

        return $this->forward(ReadDataTablesController::class . "::serializeAction", [
            "name" => DocumentDataTablesProvider::DATATABLES_NAME,
            "id"   => $id,
        ]);
    }

    /**
     * Upload a document.
     *
     * @param Request $request The request.
     * @param int|null $id The parent.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function uploadAction(Request $request, int $id = null): Response {

        $parent = $this->getEntityManager()->getRepository(Document::class)->findOneById($id);

        $document = new Document();
        $document->setCreatedAt(new DateTime());
        $document->setParent($parent);
        $document->setSize(0);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $form = $this->createForm(UploadDocumentFormType::class, $document, [
            "csrf_protection" => false,
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->dispatchDocumentEvent(DocumentEvent::PRE_NEW, $document);

            $em = $this->getEntityManager();
            $em->persist($document);
            $em->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_NEW, $document);

            return new JsonResponse($this->prepareActionResponse(200, "DropzoneController.uploadAction.success"));
        }

        return $this->render("@WBWDocument/dropzone/upload.html.twig", [
            "form"              => $form->createView(),
            "document"          => $parent,
            "uploadMaxFilesize" => intval(ini_get("upload_max_filesize")),
        ]);
    }
}
