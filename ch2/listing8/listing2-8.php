<?php

// Simiar to listing 2.7 - Here, the actual dependency is UserRepository, not EntityManager
// Only an example
final class HomepageController
{
	// php >=8.0, Constructor property promotion
	public function __construct(
		UserRepository $userRepository,
		ResponseFactory $responseFactory,
		TemplateRenderer $templateRenderer,
	) {}
	
	public function execute(Request $request): Response
	{
		$user = $this->userRepository->getById($request->get('userId'));

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
