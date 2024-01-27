<?php

/*
listing 10.1: Typical example of web controller ("generic" command-line controller example --> listing 10.2)
*/

namespace Infrastructure\UserInterface\Web;
use Infrastructure\Web\Form\ScheduleMeetupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

final class MeetupController extends AbstractController
{
	public function scheduleMeetupAction(Request $request,ScheduleMeetupType $scheduleMeetup,): Response
	{
		$form = $this->createForm($scheduleMeetupType);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			
			// ...

			// $meetup = ...

			return new RedirectResponse('/meetup-details/' . $meetup->meetupId());
		}
		
		return  $this->render('scheduleMeetup.html.twig',
					[
					  'form' => $form->createView()
					]
			);
	}
}
