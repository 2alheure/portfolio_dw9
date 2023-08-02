<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProjetCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Projet::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('titre')->setColumns(12),
            DateField::new('debut', 'Début')->setColumns(4),
            DateField::new('fin')->setColumns(4),
            BooleanField::new('enGroupe', 'En Groupe ?')->setColumns(4)
                ->renderAsSwitch(false),
            UrlField::new('url')->setColumns(12)
                ->setHelp('URL du projet (sur GitHub ou bien en ligne).'),
            TextEditorField::new('description')->setColumns(12),

            AssociationField::new('technologies')->setColumns(6),
            AssociationField::new('images')->setColumns(6),
        ];
    }
}
