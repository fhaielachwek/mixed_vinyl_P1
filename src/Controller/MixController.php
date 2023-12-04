<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\VinylMixRepository;

class MixController extends AbstractController
{
    #[Route('/mix/new')]
    public function new(EntityManagerInterface $entityManage): Response
    {
        $genres = ['pop', 'rock'];
        $mix->setGenre($genres[array_rand($genres)]);
        
        dd('new mix');
    }

    #[Route('/mix/{id}, name: 'app_mix_show'')]
    public function show($id, VinylMixRepository $mixRepository): Response
    {
        $mix = $mixRepository->find($id);
        dd($id);
    }
}