<?php

namespace App\Controller;

use App\Entity\LieuCapture;
use App\Form\LieuCaptureType;
use App\Repository\LieuCaptureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lieu/capture")
 */
class LieuCaptureController extends AbstractController
{
    /**
     * @Route("/", name="lieu_capture_index", methods={"GET"})
     */
    public function index(LieuCaptureRepository $lieuCaptureRepository): Response
    {
        return $this->render('lieu_capture/index.html.twig', [
            'lieu_captures' => $lieuCaptureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lieu_capture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lieuCapture = new LieuCapture();
        $form = $this->createForm(LieuCaptureType::class, $lieuCapture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lieuCapture);
            $entityManager->flush();

            return $this->redirectToRoute('lieu_capture_index');
        }

        return $this->render('lieu_capture/new.html.twig', [
            'lieu_capture' => $lieuCapture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_capture_show", methods={"GET"})
     */
    public function show(LieuCapture $lieuCapture): Response
    {
        return $this->render('lieu_capture/show.html.twig', [
            'lieu_capture' => $lieuCapture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lieu_capture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LieuCapture $lieuCapture): Response
    {
        $form = $this->createForm(LieuCaptureType::class, $lieuCapture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lieu_capture_index');
        }

        return $this->render('lieu_capture/edit.html.twig', [
            'lieu_capture' => $lieuCapture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_capture_delete", methods={"POST"})
     */
    public function delete(Request $request, LieuCapture $lieuCapture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lieuCapture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lieuCapture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lieu_capture_index');
    }
}
