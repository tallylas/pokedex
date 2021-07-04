<?php

namespace App\Controller;

use App\Entity\PokemonRef;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeController extends AbstractController
{
    /**
     * @Route("/liste/lister", name="lister")
     */
    public function index(): Response
    {
    	$pkmn = $this->getDoctrine()
    	->getRepository(PokemonRef::class)
    	->findAll();

        return $this->render('liste/index.html.twig', [
            'pokemons' => $pkmn
        ]);
    }

    /**
     * @Route("/liste/details/{name}", name="details")
     */
    public function details($name): Response
    {
    	$pkmn = $this->getDoctrine()
    	->getRepository(PokemonRef::class)
    	->findBy([
    		'name' => $name
    	]);

        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
            'pokemons' => $pkmn
        ]);
    }
}
