<?php

namespace App\Controller;

use App\Entity\Chasse;
use App\Form\ChasseType;
use App\Repository\ChasseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chasse")
 */
class ChasseController extends AbstractController
{
    /**
     * @Route("/", name="chasse_index", methods={"GET"})
     */
    public function index(ChasseRepository $chasseRepository): Response
    {
        return $this->render('chasse/index.html.twig', [
            'chasses' => $chasseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="chasse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $chasse = new Chasse();
        $form = $this->createForm(ChasseType::class, $chasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chasse);
            $entityManager->flush();

            return $this->redirectToRoute('chasse_index');
        }

        return $this->render('chasse/new.html.twig', [
            'chasse' => $chasse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chasse_show", methods={"GET"})
     */
    public function show(Chasse $chasse): Response
    {
        return $this->render('chasse/show.html.twig', [
            'chasse' => $chasse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chasse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Chasse $chasse): Response
    {
        $form = $this->createForm(ChasseType::class, $chasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chasse_index');
        }

        return $this->render('chasse/edit.html.twig', [
            'chasse' => $chasse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chasse_delete", methods={"POST"})
     */
    public function delete(Request $request, Chasse $chasse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chasse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chasse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chasse_index');
    }
}
