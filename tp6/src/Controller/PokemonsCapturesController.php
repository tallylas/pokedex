<?php

namespace App\Controller;

use App\Entity\PokemonsCaptures;
use App\Form\PokemonsCapturesType;
use App\Repository\PokemonsCapturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

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
     * @Route("/par_dresseur", name="pokemons_captures_par_dresseur", methods={"GET"})
     */
    public function indexParDresseur(PokemonsCapturesRepository $pokemonsCapturesRepository): Response
    {
        $repository = $this->getDoctrine()->getRepository(PokemonsCaptures::class);

        if (($this->getUser()) == null) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('pokemons_captures/index.html.twig', [
            'pokemons_captures' => $repository -> findBy(['dresseur_id' => $this->getUser()->getId()])
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
     * @Route("/{id}", name="pokemons_captures_entrainer", methods={"POST"})
     */
    public function entrainer(Request $request, PokemonsCaptures $pokemonsCapture): Response
    {

        if ($this->isCsrfTokenValid('entrainer'.$pokemonsCapture->getId(), $request->request->get('_token'))) {

            $now = strtotime("now");
            if (($pokemonsCapture->getHoraireEntrainement()) >= ($now-3600)) {
                return $this->redirectToRoute('pokemons_captures_par_dresseur');
            }

            $entityManager = $this->getDoctrine()->getManager();

            $xp = $pokemonsCapture->getXp();
            $xp += random_int(10, 30);
            $pokemonsCapture->setXp($xp);

            $qb = $entityManager->createQueryBuilder();
            $courbe = $qb -> select('p.courbeXP')
            ->from('App\Entity\PokemonRef', 'p')
            ->where('p.id = 1')
            ->getQuery();
            $courbe = implode($courbe->setMaxResults(1)->getOneOrNullResult());

            $niveau = $pokemonsCapture->getNiveau();
            $niveau++;

            switch ($courbe) {
                case "R":
                    $expNecessaire = 0.8*pow($niveau,3);
                    break;

                case "M":
                    $expNecessaire = pow($niveau,3);
                    break;

                case "P":
                    $expNecessaire = 1.2*pow($niveau,3)-15*pow($niveau,2)+100*$niveau-140;
                    break;
                
                default:
                    $expNecessaire = 999999999;
                    break;
            }

            if (($xp>$expNecessaire) && ($niveau<=99)) {
                $pokemonsCapture->setNiveau($niveau);
            }
        }

        $pokemonsCapture->setHoraireEntrainement($now); //stocker l'horaire d'entraînement
        $entityManager->flush();
        return $this->redirectToRoute('pokemons_captures_par_dresseur');
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
