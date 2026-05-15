<?php

namespace App\Controller;

use App\Repository\ProgrammeRepository;
use App\Repository\ExerciceRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/programmes', name: 'api_programmes', methods: ['GET'])]
    public function getProgrammes(ProgrammeRepository $repo): JsonResponse
    {
        $programmes = $repo->findAll();
        $data = [];

        foreach ($programmes as $programme) {
            $data[] = [
                'id' => $programme->getId(),
                'nom' => $programme->getNom(),
                'description' => $programme->getDescription(),
            ];
        }

        return $this->json($data, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE]);
    }

    #[Route('/exercices', name: 'api_exercices', methods: ['GET'])]
    public function getExercices(ExerciceRepository $repo): JsonResponse
    {
        $exercices = $repo->findAll();
        $data = [];

        foreach ($exercices as $exercice) {
            $data[] = [
                'id' => $exercice->getId(),
                'nom' => $exercice->getNom(),
                'description' => $exercice->getDescription(),
            ];
        }

        return $this->json($data, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE]);
    }

    #[Route('/categories', name: 'api_categories', methods: ['GET'])]
    public function getCategories(CategorieRepository $repo): JsonResponse
    {
        $categories = $repo->findAll();
        $data = [];

        foreach ($categories as $categorie) {
            $data[] = [
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
            ];
        }

        return $this->json($data, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE]);
    }
}
