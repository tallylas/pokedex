<?php

namespace App\Controller;

use App\Entity\PokemonsCaptures;
use App\Form\PokemonsCapturesType;
use App\Repository\PokemonsCapturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pokemons/captures")
 */
class PokemonsCapturesController extends AbstractController
{
    /**
     * @Route("/", name="pokemons_captures_index", methods={"GET"})
     */
    public function index(PokemonsCapturesRepository $pokemonsCapturesRepository): Response
    {
        return $this->render('pokemons_captures/index.html.twig', [
            'pokemons_captures' => $pokemonsCapturesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pokemons_captures_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pokemonsCapture = new PokemonsCaptures();
        $form = $this->createForm(PokemonsCapturesType::class, $pokemonsCapture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pokemonsCapture);
            $entityManager->flush();

            return $this->redirectToRoute('pokemons_captures_index');
        }

        return $this->render('pokemons_captures/new.html.twig', [
            'pokemons_capture' => $pokemonsCapture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pokemons_captures_show", methods={"GET"})
     */
    public function show(PokemonsCaptures $pokemonsCapture): Response
    {
        return $this->render('pokemons_captures/show.html.twig', [
            'pokemons_capture' => $pokemonsCapture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pokemons_captures_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PokemonsCaptures $pokemonsCapture): Response
    {
        $form = $this->createForm(PokemonsCapturesType::class, $pokemonsCapture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pokemons_captures_index');
        }

        return $this->render('pokemons_captures/edit.html.twig', [
            'pokemons_capture' => $pokemonsCapture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pokemons_captures_delete", methods={"POST"})
     */
    public function delete(Request $request, PokemonsCaptures $pokemonsCapture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pokemonsCapture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pokemonsCapture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pokemons_captures_index');
    }
}
