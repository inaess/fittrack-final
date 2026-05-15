<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Entity\SeanceExercice;
use App\Form\SeanceType;
use App\Form\SeanceExerciceType;
use App\Repository\SeanceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/seance')]
final class SeanceController extends AbstractController
{
    #[Route(name: 'app_seance_index', methods: ['GET'])]
    public function index(SeanceRepository $seanceRepository): Response
    {
        $toutes = $seanceRepository->findBy(['utilisateur' => $this->getUser()]);

        $planifiees = array_filter($toutes, fn($s) => $s->getStatut() === 'planifiee');
        $completees = array_filter($toutes, fn($s) => $s->getStatut() === 'completee');
        $annulees = array_filter($toutes, fn($s) => $s->getStatut() === 'annulee');

        return $this->render('seance/index.html.twig', [
            'planifiees' => $planifiees,
            'completees' => $completees,
            'annulees' => $annulees,
        ]);
    }

    #[Route('/new', name: 'app_seance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $seance = new Seance();
        $seance->setUtilisateur($this->getUser());
        $form = $this->createForm(SeanceType::class, $seance, [
            'user' => $this->getUser(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seance);
            $entityManager->flush();
            $this->addFlash('success', 'Séance créée avec succès !');

            return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seance/new.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_seance_show', methods: ['GET', 'POST'])]
    public function show(Request $request, Seance $seance, EntityManagerInterface $entityManager): Response
    {
        $seanceExercice = new SeanceExercice();
        $seanceExercice->setSeance($seance);

        $form = $this->createForm(SeanceExerciceType::class, $seanceExercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($seanceExercice);
            $entityManager->flush();
            $this->addFlash('success', 'Exercice ajouté à la séance !');

            return $this->redirectToRoute('app_seance_show', ['id' => $seance->getId()]);
        }

        return $this->render('seance/show.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/statut/{statut}', name: 'app_seance_statut', methods: ['POST'])]
    public function changerStatut(Request $request, Seance $seance, string $statut, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('statut'.$seance->getId(), $request->getPayload()->getString('_token'))) {
            $statuts = ['planifiee', 'completee', 'annulee'];
            if (in_array($statut, $statuts)) {
                $seance->setStatut($statut);
                $entityManager->flush();
                $this->addFlash('success', 'Statut mis à jour !');
            }
        }

        return $this->redirectToRoute('app_seance_index');
    }

    #[Route('/{id}/edit', name: 'app_seance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Seance $seance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SeanceType::class, $seance, [
            'user' => $this->getUser(),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Séance modifiée avec succès !');

            return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seance/edit.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/exercice/{exerciceId}/delete', name: 'app_seance_exercice_delete', methods: ['POST'])]
    public function deleteExercice(Request $request, Seance $seance, int $exerciceId, EntityManagerInterface $entityManager): Response
    {
        $seanceExercice = $entityManager->getRepository(SeanceExercice::class)->find($exerciceId);

        if ($seanceExercice && $this->isCsrfTokenValid('delete_se'.$exerciceId, $request->getPayload()->getString('_token'))) {
            $entityManager->remove($seanceExercice);
            $entityManager->flush();
            $this->addFlash('success', 'Exercice retiré de la séance !');
        }

        return $this->redirectToRoute('app_seance_show', ['id' => $seance->getId()]);
    }

    #[Route('/{id}', name: 'app_seance_delete', methods: ['POST'])]
    public function delete(Request $request, Seance $seance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seance->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($seance);
            $entityManager->flush();
            $this->addFlash('success', 'Séance supprimée !');
        }

        return $this->redirectToRoute('app_seance_index', [], Response::HTTP_SEE_OTHER);
    }
}
