<?php
declare(strict_types=1);

namespace MyTests;

use MyClasses\ChangePasswordService;
use MyClasses\EventDispatcher; // not in this listing
use MyClasses\UserId; // not in this listing
use MyClasses\UserPasswordChanged; // not in this listing

use PHPUnit\Framework\TestCase;

class ChangePasswordServiceTest extends \PHPUnit_Framework_TestCase
{
	public function it_dispatches_a_user_password_changed_event():void
	{
		$userId = new UserId();
		
		$eventDispatcherMock = $this->getMockBuilder(\MyClasses\EventDispatcher::class)->getMock();
									
		$eventDispatcherMock->expects($this->once())
							->method('dispatch')
							->with(new UserPasswordChanged($userId));
									
		$service = new ChangePasswordService($eventDispatcherMock,/* ... */);

		$testPassword = "1234";
		
		// "ressource (closed)" as of PHP 7.2.0
		$php_var_get_types = array("boolean","integer","double","string","array",
									"object","resource","resource (closed)","NULL","unknown type");
		
		$returnType = gettype($service->changeUserPassword($userId,$testPassword));
	
		$this->assertNotContains($returnType,$php_var_get_types,'The changeUserPassword() method does not return void.'); 
				
	}
	// ...

}
