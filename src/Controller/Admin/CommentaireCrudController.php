<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class CommentaireCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Commentaire::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            DateField::new('date'),
            TextareaField::new('contenu'),
            AssociationField::new('utilisateur'),
            AssociationField::new('projet'),
        ];
    }
}
