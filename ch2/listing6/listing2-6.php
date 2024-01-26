<?php

// Using a ServiceLocator to retrieve dependencies - This is only an example
final class HomepageController
{
	public function __construct(
		private ServiceLocator $locator
	){}
	
	public function execute(Request $request, /* ..... */): Response|bool
	{

		if (!is_object($entityManager) || !is_object($repository) || !is_object($responseFactory) || !is_object($templateRenderer))
		{
			return false;
		}
		
		
		$user = $this->locator->get(get_class($entityManager))
					 ->getRepository(get_class($repository))
					 ->getById($request->get('userId'));

		return $this->locator->get(get_class($responseFactory))
							->create()
							->withContent($this->locator->get(get_class($templateRenderer))
								->render(
									'homepage.html.twig',
									[
										'user' => $user
									]
								),
								'text/html'
							);
	}
}
