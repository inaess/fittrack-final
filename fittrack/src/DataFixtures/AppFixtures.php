<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Exercice;
use App\Entity\Programme;
use App\Entity\Seance;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {

        $user = new Utilisateur();
        $user->setEmail('user@fittrack.com');
        $user->setPseudo('UserFit');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->hasher->hashPassword($user, 'password123'));
        $manager->persist($user);

        $admin = new Utilisateur();
        $admin->setEmail('admin@fittrack.com');
        $admin->setPseudo('AdminFit');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->hasher->hashPassword($admin, 'admin123'));
        $manager->persist($admin);

        $invite = new Utilisateur();
        $invite->setEmail('invite@fittrack.com');
        $invite->setPseudo('InviteFit');
        $invite->setRoles(['ROLE_INVITED']);
        $invite->setPassword($this->hasher->hashPassword($invite, 'invite123'));
        $manager->persist($invite);


        $categories = [
            ['nom' => 'Musculation', 'couleur' => '#FF5733'],
            ['nom' => 'Cardio', 'couleur' => '#33FF57'],
            ['nom' => 'Yoga', 'couleur' => '#3357FF'],
            ['nom' => 'Stretching', 'couleur' => '#FF33F5'],
        ];

        $categorieObjects = [];
        foreach ($categories as $cat) {
            $categorie = new Categorie();
            $categorie->setNom($cat['nom']);
            $categorie->setCouleur($cat['couleur']);
            $manager->persist($categorie);
            $categorieObjects[] = $categorie;
        }


        $exercicesData = [
            ['nom' => 'Squat', 'description' => 'Exercice de base pour les jambes et les fessiers.'],
            ['nom' => 'Pompes', 'description' => 'Exercice pour les pectoraux, épaules et triceps.'],
            ['nom' => 'Tractions', 'description' => 'Exercice pour le dos et les biceps.'],
            ['nom' => 'Planche', 'description' => 'Exercice isométrique pour les abdominaux.'],
            ['nom' => 'Burpees', 'description' => 'Exercice cardio complet pour tout le corps.'],
            ['nom' => 'Fentes', 'description' => 'Exercice pour les cuisses et les fessiers.'],
        ];

        $exerciceObjects = [];
        foreach ($exercicesData as $ex) {
            $exercice = new Exercice();
            $exercice->setNom($ex['nom']);
            $exercice->setDescription($ex['description']);
            $manager->persist($exercice);
            $exerciceObjects[] = $exercice;
        }


        $programmesData = [
            ['nom' => 'Full Body Débutant', 'description' => 'Programme complet pour débutants, 3 séances par semaine.', 'niveau' => 'Débutant', 'categorie' => 0],
            ['nom' => 'Cardio Intensif', 'description' => 'Programme cardio pour brûler des calories rapidement.', 'niveau' => 'Intermédiaire', 'categorie' => 1],
            ['nom' => 'Yoga Relaxation', 'description' => 'Programme de yoga pour déstresser et s\'étirer.', 'niveau' => 'Débutant', 'categorie' => 2],
            ['nom' => 'Musculation Avancée', 'description' => 'Programme intensif pour gagner de la masse musculaire.', 'niveau' => 'Avancé', 'categorie' => 0],
        ];

        $programmeObjects = [];
        foreach ($programmesData as $prog) {
            $programme = new Programme();
            $programme->setNom($prog['nom']);
            $programme->setDescription($prog['description']);
            $programme->setNiveau($prog['niveau']);
            $programme->setCategorie($categorieObjects[$prog['categorie']]);
            $programme->setUtilisateur($user);
            $manager->persist($programme);
            $programmeObjects[] = $programme;
        }


        $seancesData = [
            ['date' => '2026-03-01 09:00:00', 'duree' => 60, 'notes' => 'Bonne séance, bien échauffé.', 'programme' => 0],
            ['date' => '2026-03-05 18:00:00', 'duree' => 45, 'notes' => 'Séance cardio intense.', 'programme' => 1],
            ['date' => '2026-03-10 07:30:00', 'duree' => 30, 'notes' => 'Yoga du matin très relaxant.', 'programme' => 2],
            ['date' => '2026-03-15 20:00:00', 'duree' => 90, 'notes' => 'Séance muscu longue mais efficace.', 'programme' => 3],
            ['date' => '2026-03-20 10:00:00', 'duree' => 60, 'notes' => 'Full body complet.', 'programme' => 0],
        ];

        foreach ($seancesData as $s) {
            $seance = new Seance();
            $seance->setDate(new \DateTime($s['date']));
            $seance->setDuree($s['duree']);
            $seance->setNotes($s['notes']);
            $seance->setProgramme($programmeObjects[$s['programme']]);
            $seance->setUtilisateur($user);
            $manager->persist($seance);
        }

        $manager->flush();
    }
}
