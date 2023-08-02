<?php

namespace App\Controller\Admin;

use App\Entity\CentreDInteret;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CentreDInteretCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return CentreDInteret::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nom'),
            TextEditorField::new('description'),
            UrlField::new('image'),
        ];
    }
}
