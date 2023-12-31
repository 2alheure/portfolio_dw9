<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ImageCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            UrlField::new('url')
        ];
    }
}
