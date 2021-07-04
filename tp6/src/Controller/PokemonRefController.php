<?php

namespace App\Controller;

use App\Entity\PokemonRef;
use App\Form\PokemonRefType;
use App\Repository\PokemonRefRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pokemon/ref")
 */
class PokemonRefController extends AbstractController
{
    /**
     * @Route("/", name="pokemon_ref_index", methods={"GET"})
     */
    public function index(PokemonRefRepository $pokemonRefRepository): Response
    {
        return $this->render('pokemon_ref/index.html.twig', [
            'pokemon_refs' => $pokemonRefRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pokemon_ref_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pokemonRef = new PokemonRef();
        $form = $this->createForm(PokemonRefType::class, $pokemonRef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pokemonRef);
            $entityManager->flush();

            return $this->redirectToRoute('pokemon_ref_index');
        }

        return $this->render('pokemon_ref/new.html.twig', [
            'pokemon_ref' => $pokemonRef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pokemon_ref_show", methods={"GET"})
     */
    public function show(PokemonRef $pokemonRef): Response
    {
        return $this->render('pokemon_ref/show.html.twig', [
            'pokemon_ref' => $pokemonRef,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pokemon_ref_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PokemonRef $pokemonRef): Response
    {
        $form = $this->createForm(PokemonRefType::class, $pokemonRef);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pokemon_ref_index');
        }

        return $this->render('pokemon_ref/edit.html.twig', [
            'pokemon_ref' => $pokemonRef,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pokemon_ref_delete", methods={"POST"})
     */
    public function delete(Request $request, PokemonRef $pokemonRef): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokemonRef->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pokemonRef);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pokemon_ref_index');
    }
}
