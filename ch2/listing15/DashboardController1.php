<?php

// use corresponding_namespace/Cache;
// use corresponding_namespace/Response;

// Part 1: injecting a Cache instance instead of using static methods
final class DashboardController1
{
	public function execute(): Response
	{
		$recentPosts = [];

		if (Cache->has('recent_posts')) {
			$recentPosts = Cache->get('recent_posts');
		}
	
		// ... (return $response;)
	
	}
}
