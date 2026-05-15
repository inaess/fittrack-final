<?php

namespace App\Controller\Admin;

use App\Entity\Programme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProgrammeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Programme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextareaField::new('description'),
            TextField::new('niveau'),
            AssociationField::new('categorie'),
            AssociationField::new('utilisateur'),
        ];
    }
}
