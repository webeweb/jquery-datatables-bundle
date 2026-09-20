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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\DataTablesBundle\Controller\ReadDataTablesController;
use WBW\Bundle\DocumentBundle\DataTables\Provider\DocumentDataTablesProvider;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Event\DocumentEvent;
use WBW\Bundle\DocumentBundle\Form\Type\Document\MoveDocumentFormType;
use WBW\Bundle\DocumentBundle\Form\Type\Document\UploadDocumentFormType;
use WBW\Bundle\DocumentBundle\Form\Type\DocumentFormType;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Repository\DocumentRepository;

/**
 * Document controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Controller
 */
class DocumentController extends AbstractController {

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.document.controller.document";

    /**
     * Delete an existing document.
     *
     * @param int $id The document.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function deleteAction(int $id): Response {

        $document = $this->findDocument($id, true);

        $type = $document->isDocument() ? "document" : "directory";

        try {

            $backedUp = clone $document; // Clone to preserve id attribute

            $this->dispatchDocumentEvent(DocumentEvent::PRE_DELETE, $document);

            $em = $this->getEntityManager();
            $em->remove($document);
            $em->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_DELETE, $backedUp);

            $this->notifySuccess($this->translate("DocumentController.deleteAction.success.$type"));
        } catch (Throwable $ex) {
            $this->notifyDanger($this->translate("DocumentController.deleteAction.danger.$type"));
        }

        [$route, $parameters] = $this->buildRedirectRoute($document);

        return $this->redirectToRoute($route, $parameters);
    }

    /**
     * Download an existing document.
     *
     * @param int $id The document.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function downloadAction(int $id): Response {

        $document = $this->findDocument($id, true);

        $event = $this->dispatchDocumentEvent(DocumentEvent::PRE_DOWNLOAD, $document);
        if (null === $event->getResponse()) {
            return new Response("Internal Server Error", 500);
        }

        return $event->getResponse();
    }

    /**
     * Display a form to edit an existing document.
     *
     * @param Request $request The request.
     * @param int $id The document.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function editAction(Request $request, int $id): Response {

        $document = $this->findDocument($id, true);

        $type = $document->isDocument() ? "document" : "directory";

        $form = $this->createForm(DocumentFormType::class, $document);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->dispatchDocumentEvent(DocumentEvent::PRE_EDIT, $document);

            $document->setUpdatedAt(new DateTime());
            $this->getEntityManager()->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_EDIT, $document);

            $this->notifySuccess($this->translate("DocumentController.editAction.success.$type"));

            [$route, $parameters] = $this->buildRedirectRoute($document);
            return $this->redirectToRoute($route, $parameters);
        }

        return $this->render("@WBWDocument/document/form.html.twig", [
            "form"     => $form->createView(),
            "document" => $document,
        ]);
    }

    /**
     * Index all documents.
     *
     * @param Request $request The request.
     * @return Response Returns the response.
     */
    public function indexAction(Request $request): Response {

        $id = $request->attributes->get("id");

        $path  = ["name" => DocumentDataTablesProvider::DATATABLES_NAME];
        $query = null === $id ? [] : ["id" => $id];

        return $this->forward(ReadDataTablesController::class . "::indexAction", $path, $query);
    }

    /**
     * Display a form to move an existing document.
     *
     * @param Request $request The request.
     * @param int $id The document.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function moveAction(Request $request, int $id): Response {

        $document = $this->findDocument($id, true);

        $except = $document->isDirectory() ? $document : $document->getParent();
        $type   = $document->isDocument() ? "document" : "directory";

        /** @var DocumentRepository $repository */
        $repository = $this->getEntityManager()->getRepository(Document::class);

        $form = $this->createForm(MoveDocumentFormType::class, $document, [
            "entity.parent" => $repository->findAllDirectoriesExcept($except),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->dispatchDocumentEvent(DocumentEvent::PRE_MOVE, $document);

            $document->setUpdatedAt(new DateTime());
            $this->getEntityManager()->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_MOVE, $document);

            $this->notifySuccess($this->translate("DocumentController.moveAction.success.{$type}"));

            [$route, $parameters] = $this->buildRedirectRoute($document);
            return $this->redirectToRoute($route, $parameters);
        }

        return $this->render("@WBWDocument/document/move.html.twig", [
            "form"     => $form->createView(),
            "document" => $document,
        ]);
    }

    /**
     * Create a new document.
     *
     * @param Request $request The request.
     * @param int|null $id The parent.
     * @return Response Returns the response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function newAction(Request $request, int $id = null): Response {

        $parent = $this->findDocument($id, false);

        $document = new Document();
        $document->setCreatedAt(new DateTime());
        $document->setParent($parent);
        $document->setSize(0);
        $document->setType(DocumentInterface::TYPE_DIRECTORY);

        $form = $this->createForm(DocumentFormType::class, $document);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->dispatchDocumentEvent(DocumentEvent::PRE_NEW, $document);

            $em = $this->getEntityManager();
            $em->persist($document);
            $em->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_NEW, $document);

            $this->notifySuccess($this->translate("DocumentController.newAction.success.directory"));

            [$route, $parameters] = $this->buildRedirectRoute($document);
            return $this->redirectToRoute($route, $parameters);
        }

        return $this->render("@WBWDocument/document/form.html.twig", [
            "form"     => $form->createView(),
            "document" => $document,
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

        $parent = $this->findDocument($id, false);

        $document = new Document();
        $document->setCreatedAt(new DateTime());
        $document->setParent($parent);
        $document->setSize(0);
        $document->setType(DocumentInterface::TYPE_DOCUMENT);

        $form = $this->createForm(UploadDocumentFormType::class, $document);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $this->dispatchDocumentEvent(DocumentEvent::PRE_NEW, $document);

            $em = $this->getEntityManager();
            $em->persist($document);
            $em->flush();

            $this->dispatchDocumentEvent(DocumentEvent::POST_NEW, $document);

            $this->notifySuccess($this->translate("DocumentController.uploadAction.success.document"));

            [$route, $parameters] = $this->buildRedirectRoute($document);
            return $this->redirectToRoute($route, $parameters);
        }

        return $this->render("@WBWDocument/document/upload.html.twig", [
            "form"     => $form->createView(),
            "document" => $document,
        ]);
    }
}
