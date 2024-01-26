<?php

/*
listing 3.38 & 3.39 :
- Using a property filler for the ScheduleMeetup DTO
- Validating the ScheduleMeetup DTO
- Also look at listing 3.36 & 3.37
*/

final class ScheduleMeetup
{
	public string $title;
	public string $datum;
	
	public static function fromFormData(array $formData): ScheduleMeetup
	{		
		$scheduleMeetup = new self();
		$scheduleMeetup->title = $formData['title'];
		$scheduleMeetup->datum = $formData['date'];

		return $scheduleMeetup;
	}
	
	#  use form and validation libraries , ex: Symfony Form and Validator components 
	#  The method is fictitious, it serves only as an example.
	public function validate(): array
	{
		$errors = [];

		if ($this->title == '') {		
			$errors['title'][] = 'validation.empty_title';
		}
		
		if (this->datum == '') {
			$errors['date'][] = 'validation.empty_date';
		}
		
		DateTime::createFromFormat('d/m/Y',$this->datum);

		$errors = DateTime::getLastErrors();

		if ($errors['error_count'] > 0) {
			errors['date'][] = 'validation.invalid_date_format';
		}
	
		return $errors;
	}
}
