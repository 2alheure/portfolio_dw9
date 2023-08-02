<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class FormationCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Formation::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('titre'),
            DateField::new('debut', 'Début')->setColumns(6),
            DateField::new('fin')->setColumns(6),
            TextField::new('etablissement', 'Etablissement dans lequel la formation s\'est déroulée'),
            TextField::new('lieu', 'Adresse de l\'établissement'),
            TextEditorField::new('description'),
        ];
    }
}
