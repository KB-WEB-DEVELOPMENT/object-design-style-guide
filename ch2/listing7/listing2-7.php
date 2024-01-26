<?php

// Injecting the actual dependencies as constructor arguments - This is only an example
final class HomepageController
{
	// php >=8.0, Constructor property promotion
	public function __construct(
		EntityManager $entityManager,
		ResponseFactory $responseFactory,
		TemplateRenderer $templateRenderer,
	) {}
	
	public function execute(Request $request): Response
	{
		$user = $this->entityManager->getRepository('user')
					 ->getById($request->get('userId'));

		$res = $this->responseFactory
			->create()
			->withContent(
				$this->templateRenderer->render(
					'homepage.html.twig',
					[
						'user' => $user
					]
				),
				'text/html'
			);
	}
}
