<?php

namespace App\Controller\Admin;

use App\Entity\Technologie;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class TechnologieCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Technologie::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nom'),
            UrlField::new('icone', 'Icône'),
            IntegerField::new('niveau')
        ];
    }
}
