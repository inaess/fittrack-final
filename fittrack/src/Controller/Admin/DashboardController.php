<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Exercice;
use App\Entity\Programme;
use App\Entity\Seance;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('FitTrack Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Utilisateurs', 'fa fa-users', 'admin_utilisateur_index');
        yield MenuItem::linkToRoute('Programmes', 'fa fa-list', 'admin_programme_index');
        yield MenuItem::linkToRoute('Séances', 'fa fa-calendar', 'admin_seance_index');
        yield MenuItem::linkToRoute('Exercices', 'fa fa-dumbbell', 'admin_exercice_index');
        yield MenuItem::linkToRoute('Catégories', 'fa fa-tag', 'admin_categorie_index');
    }
}
