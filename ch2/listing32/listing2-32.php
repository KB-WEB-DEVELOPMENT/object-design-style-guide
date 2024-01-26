<?php

/*
This works but should be AVOIDED for a number of reasons;
	1. It is not clear if the translate() method always returns a string.
	2. The construct method should only be used to assign property values when the object is created.
	   A service object, i.e. : Translator, should not perform a behaviour change in the constructor 
	   but rather in its own method.
*/
final class Mailer
{
	private string $defaultSubject;

	public function __construct(
		private Translator $translator
	){
		$this->defaultSubject = $this->translator->translate('default_subject');
	}
}
