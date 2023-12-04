<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\VinylMixRepository;
use Symfony\Component\HttpFoundation\Request;

class MixController extends AbstractController
{
    #[Route('/mix/new')]
    public function new(EntityManagerInterface $entityManage): Response
    {
        $genres = ['pop', 'rock'];
        $mix->setGenre($genres[array_rand($genres)]);
        
        dd('new mix');
    }

    #[Route('/mix/{id}', name: 'app_mix_show')]
    public function show(VinylMix $mix): Response
    {
        return $this->render('mix/show.html.twig', [
            'mix' => $mix,
        ]);
    }

    #[Route('/mix/{id}/vote', name: 'app_mix_vote', methods: ['POST'])]
    public function vote(VinylMix $mix, Request $request,  EntityManagerInterface $entityManager): Response
    {
        $direction = $request->request->get('direction', 'up');
        if ($direction === 'up') {
            if ($direction === 'up') {
                $mix->upVote();
            } else {
                $mix->downVote();
        }
        $entityManager->flush();
        $this->addFlash('success', 'Vote counted!');
        
        return $this->redirectToRoute('app_mix_show', [
            'id' => $mix->getId(),
        ]);
    }
}