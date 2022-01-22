<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use Doctrine\DBAL\Types\ArrayType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
//use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PatientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Patient::class;
    }


    public function configureFields(string $pageName): iterable
    {



        return [
            IdField::new('id')->hideOnForm(),
            ArrayField::new('roles'),
            TextField::new('fullname'),
            DateField::new('dob'),
            EmailField::new('email'),
            TextField::new('password'),

        ];
        /*
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ]; */
    }
}
