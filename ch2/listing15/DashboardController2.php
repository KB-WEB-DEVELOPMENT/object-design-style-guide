<?php

// use corresponding_namespace/Cache;
// use corresponding_namespace/Response;

// Part 2: injecting a Cache instance instead of using static methods
final class DashboardController2
{
	public function __construct(
		private Cache $cache
	) {}
	
	public function execute(): Response
	{
		$recentPosts = [];

		if ($this->cache->has('recent_posts')) {
			$recentPosts = $this->cache->get('recent_posts');
		}

		// ... (return $response;)
	}
}
