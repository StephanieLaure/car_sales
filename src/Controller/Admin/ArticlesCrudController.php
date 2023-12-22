<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Polyfill\Intl\Icu\DateFormat\YearTransformer;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            TextField::new('titre'),
            TextField:: new('imageFile')-> setFormtype(VichImageType::class)->OnlyWhenCreating(),
            TextEditorField::new('description'),
            MoneyField:: new('price')->setCurrency('EUR'),
            NumberField::new('kilometrage'),
            NumberField::new('year'),
            TextField::new('moteur'),
            
        ];
    }
    
}
