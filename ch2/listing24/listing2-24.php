<?php

// Continuation of listing 2.23 - UserId and CompanyId should be passed as method argument
final class ContactRepository
{
	public function getAllContacts(UserId $userId,CompanyId $companyId): array 
	{

		return this->select()->where(
			[
				'userId' => $userId,
				'companyId' => $companyId
			]
		)->getResult();
	}
}
