<?php
namespace App\Form\TypeExtension;


use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeExtensionInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextAreaSizeExtension implements FormTypeExtensionInterface {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		// TODO: Implement buildForm() method.
	}
	
	public function buildView(FormView $view, FormInterface $form, array $options) {
		// TODO: Implement buildView() method.
	}
	
	public function finishView(FormView $view, FormInterface $form, array $options) {
		// TODO: Implement finishView() method.
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		// TODO: Implement configureOptions() method.
	}
	
	public function getExtendedType() {
		return '';
	}
	
	public function getExtendedTypes():iterable {
		return [TextareaType::class];
	}
}