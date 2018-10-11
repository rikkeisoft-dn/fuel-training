<?php

class Controller_Admin_Base extends \Fuel\Core\Controller_Template
{
	/**
     * @var string page template
     */
	public $template = 'admin/layouts/template';

	public function before()
	{
		parent::before();

		$this->current_user = null;

		foreach(\Auth::verified() as $driver)
		{
			if(($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
			}
			break;
		}

		// Set a global variable so views can use it
		$this->template->set_global('current_user', $this->current_user);
	}

}
