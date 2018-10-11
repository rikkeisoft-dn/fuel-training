<?php
return array(
	'_root_'  => 'site/blog/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	'admin/login' => 'admin/auth/login',
	'admin/logout' => 'admin/auth/logout',
	'admin' => 'admin/auth/index',
	'admin/index' => 'admin/auth/index',

	'blog' => 'site/blog/index',
	'blog/index' => 'site/blog/index',
	'blog/view/:slug' => 'site/blog/view/$1',
	'blog/comment' => 'site/blog/comment',
);
