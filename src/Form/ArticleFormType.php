<?php
namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
		$article = $options['data'] ?? null;
		$isEdit = $article && $article->getId();
		
		$builder
			->add('title', TextType::class, [
				'help' => 'Choose something catchy'
			])
			->add('content', null, [
				'rows' => 15
			])
			->add('author', UserSelectTextType::class, [
				'disabled' => $isEdit
			])
			->add('location', ChoiceType::class, [
				'placeholder' => 'Choose a location',
				'choices' => [
					"The Solar System" => "solar_system",
					"Near a star" => "star",
					"Interstellar Space" => "interstellar_space"
				],
				'required' => false
			])
			->add('specificLocationName', ChoiceType::class, [
				'placeholder' => 'Where exactly?',
				'choices' => [
					'TODO' => 'TODO'
				],
				'required' => false
			])
		;
		
		if ($options['include_published_at']){
			$builder->add('publishedAt', null, [
				'widget' => 'single_text'
			]);
		}
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults([
			'data_class' => Article::class,
			'include_published_at' => false
		]);
	}
	
	private function getLocationNameChoices(string $location) {
		$planets = [
			'Mercury',
			'Venus',
			'Earth',
			'Mars',
			'Jupiter',
			'Saturn',
			'Uranus',
			'Neptune',
		];
		$stars = [
			'Polaris',
			'Sirius',
			'Alpha Centauari A',
			'Alpha Centauari B',
			'Betelgeuse',
			'Rigel',
			'Other'
		];
		$locationNameChoices = [
			'solar_system' => array_combine($planets, $planets),
			'star' => array_combine($stars, $stars),
			'interstellar_space' => null,
		];
		return $locationNameChoices[$location];
	}
}