<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CompetenceCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Competence::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            UrlField::new('url', 'URL d\'un éventuel certificat'),
            UrlField::new('icone', 'Icône'),
        ];
    }
}
