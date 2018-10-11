<?php

class Controller_Admin_Posts extends Controller_Admin_Base
{

	public function action_index()
	{
		$query         = Model_Post::query();
		$pagination    = Pagination::forge('post_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));
		$data['posts'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();
		$this->template->set_global('pagination', $pagination, true);
		$this->template->title   = "Posts";
		$this->template->content = View::forge('admin/posts/index', $data);
	}

	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);

		$this->template->title   = "Post";
		$this->template->content = View::forge('admin/posts/view', $data);
	}

	public function action_create()
	{
		if(Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if($val->run())
			{
				$post = Model_Post::forge(array(
					'title'   => Input::post('title'),
					'slug'    => str_slug(Input::post('title')),
					'summary' => Input::post('summary'),
					'body'    => Input::post('body'),
					'user_id' => Input::post('user_id'),
				));

				if($post and $post->save())
				{
					Session::set_flash('success', e('Added post #'.$post->id.'.'));

					Response::redirect('admin/posts');
				}

				else
				{
					Session::set_flash('error', e('Could not save post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('users', Arr::pluck(Model_User::find('all'), 'username', 'id'));
		$this->template->title   = "Posts";
		$this->template->content = View::forge('admin/posts/create');
	}

	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);
		$val  = Model_Post::validate('edit');

		if($val->run())
		{
			$post->title   = Input::post('title');
			$post->slug    = str_slug(Input::post('title'));
			$post->summary = Input::post('summary');
			$post->body    = Input::post('body');
			$post->user_id = Input::post('user_id');

			if($post->save())
			{
				Session::set_flash('success', e('Updated post #'.$id));

				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', e('Could not update post #'.$id));
			}
		}

		else
		{
			if(Input::method() == 'POST')
			{
				$post->title   = $val->validated('title');
				$post->slug    = $val->validated('slug');
				$post->summary = $val->validated('summary');
				$post->body    = $val->validated('body');
				$post->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}

		$this->template->set_global('users', Arr::pluck(Model_User::find('all'), 'username', 'id'), false);
		$this->template->title   = "Posts";
		$this->template->content = View::forge('admin/posts/edit');
	}

	public function action_delete($id = null)
	{
		if($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', e('Deleted post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}

		Response::redirect('admin/posts');
	}

}
