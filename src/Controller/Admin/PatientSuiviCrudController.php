<?php

namespace App\Controller\Admin;

use App\Entity\PatientSuivi;
use App\Repository\PatientRepository;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class PatientSuiviCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PatientSuivi::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('patient'),
            IntegerField::new('glycemie'),
            IntegerField::new('glucide'),
            DateTimeField::new('createdAt')->setValue(new DateTime()),
            IntegerField::new('insuline'),
        ];
    }
}
