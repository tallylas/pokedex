<?php

namespace App\Controller;

use App\Entity\Dresseur;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\PokemonsCaptures;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use App\Controller\PokemonRef;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    //public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    //{
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder) //, ConnexionController $guard)
    {
        $user = new Dresseur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $password = $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                );

            $user->setPassword($password);

            $user->setCoins(5000);
            $user->setName($form->get('name')->getData());
            $user->setRoles(["ROLE_USER"]); //update
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $token = new UsernamePasswordToken(
                $user,
                $password,
                'main',
                $user->getRoles()
            );

            $this->get('security.token_storage')->setToken($token);
            $this->get('session')->set('_security_main', serialize($token));

            //Créer une capture avec le premier pokémon du nouveau dresseur

            $entityManager = $this->getDoctrine()->getManager();
            $newCapture = new PokemonsCaptures();

            //$qb = $entityManager->createQueryBuilder();
            /*$userCreated = $qb -> select('d.id')
            ->from('App\Entity\Dresseur', 'd')
            ->where('d.name = '.$user->getEmail())
            ->getQuery();
            $userCreated = implode($userCreated->setMaxResults(1)->getOneOrNullResult());*/

            $newCapture->setDresseurId(40); //$this->getUser()->getId());
            $newCapture->setPokemonId(2);

            /*$qb = $entityManager->createQueryBuilder();
            $pok = $qb -> select('id')
            ->from('App\Entity\PokemonRef', 'p')
            ->where('p.id = 1')
            ->getQuery();
            $pok = implode($pok->setMaxResults(1)->getOneOrNullResult());*/

            //$newCapture->setPokemonId($form->get('choixPremierPokemon')->getData());
            //$newCapture->addPokemonId($pok);

            //Problème : dresseurId et pokemonId NULL dans la bdd

            $genre = array('a' => "M", 'b' => "F");
            shuffle($genre);
            $newCapture->setSexe($genre[0]);

            $newCapture->setNiveau(5);
            $newCapture->setXp(0);

            $entityManager->persist($newCapture);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
