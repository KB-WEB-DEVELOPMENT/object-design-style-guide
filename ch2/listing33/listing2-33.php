<?php

/*
This is bad practice and should fail because:
	1. It is not clear if the translate() method always returns a string.
	2. The construct method should only be used to assign property values when the object is created,
	   not for when a service object performs some behaviour change, here the method translate().
*/
final class Mailer
{

	private string defaultSubject;

	public function __construct(
		private Translator $translator,
		private string $locale,
	) {
		
		$this->defaultSubject = $this->translator->translate('default_subject',$locale);

		// ...

	}
	
	// ...

}
