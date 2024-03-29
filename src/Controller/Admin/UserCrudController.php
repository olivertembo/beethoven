<?php declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

	public function configureFields(string $pageName): iterable
	{
		$fields = [
			TextField::new('username'),
			ArrayField::new('roles'),
		];

		if($pageName === 'new' || $pageName === 'edit') {
			$fields[] = TextField::new('password', 'Password (hashed)')
				->setHelp('Use: bin/console security:encode-password [plain password]');
		}

		return $fields;
	}
}
