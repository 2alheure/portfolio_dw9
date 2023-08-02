<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class UtilisateurCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Utilisateur::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('pseudo')->setColumns(12),
            EmailField::new('email')->setColumns(12),
            UrlField::new('avatar')->setColumns(12),
            ChoiceField::new('roles', 'Rôles')->setChoices([
                'Utilisateur lambda' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN'
            ])
                ->renderExpanded()
                ->allowMultipleChoices()
                ->renderAsBadges([
                    'ROLE_USER' => 'success',
                    'ROLE_ADMIN' => 'danger',
                ])
        ];
    }
}
