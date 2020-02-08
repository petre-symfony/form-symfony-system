<?php
namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType {
	/**
	 * @var UserRepository
	 */
	private $userRepo;
	
	public function __construct(UserRepository $userRepo) {
		$this->userRepo = $userRepo;
	}
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('title', TextType::class, [
				'help' => 'Choose something catchy'
			])
			->add('content', null, [
				'attr' => ['rows' => 10]
			])
			->add('publishedAt', null, [
				'widget' => 'single_text'
			])
			->add('author', UserSelectTextType::class);
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults([
			'data_class' => Article::class
		]);
	}
	
	
}