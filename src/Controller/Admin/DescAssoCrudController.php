<?php

namespace App\Controller\Admin;

use App\Entity\DescAsso;
//use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class DescAssoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DescAsso::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('titre'),
            TextEditorField::new('contenu'),
            ImageField::new('image'),
        ];
    }
}
