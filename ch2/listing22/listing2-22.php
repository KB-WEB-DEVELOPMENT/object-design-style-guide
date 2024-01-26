<?php

// ContactRepository depending on a Session object - very limited use
final class ContactRepository
{
	public function __construct(
		private Session $session
	){}
	
	public function getAllContacts(): array
	{
		return this->select()->where(
			[
				'userId' => $this->session->getUserId(),
				'companyId' => this->session->get('companyId')
			]
		
		)->getResult();
	}
}
