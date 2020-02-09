<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueUserValidator extends ConstraintValidator {
	public function validate($value, Constraint $constraint) {
		/* @var $constraint \App\Validator\UniqueUser */

		if (null === $value || '' === $value) {
			return;
		}

		// TODO: implement the validation here
		$this->context->buildViolation($constraint->message)
			->addViolation();
	}
}
