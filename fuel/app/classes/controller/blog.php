<?php

class Controller_Blog extends \Fuel\Core\Controller_Template
{
	public $template = 'blog/template';

	public function action_index()
	{
		$view = View::forge('blog/index');

		$view->posts = Model_Post::find('all');

		$this->template->title   = 'My Blog';
		$this->template->content = $view;
	}

	public function action_view($slug)
	{
		$post = Model_Post::find_by_slug($slug, array('related' => array('user')));

		$this->template->title   = $post->title;
		$this->template->content = View::forge('blog/view', array(
			'post' => $post,
		));
	}
}
