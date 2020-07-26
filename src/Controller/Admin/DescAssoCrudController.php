<?php

namespace App\Controller\Admin;

use App\Entity\DescAsso;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DescAssoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DescAsso::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
