<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class EvenementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('titre'),
            TextEditorField::new('contenu'),
            TelephoneField::new('telephone'),
            DateField::new('date'),
            ImageField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->setLabel('image'),
            DateTimeField::new('date'),
        ];
    }
    
}
