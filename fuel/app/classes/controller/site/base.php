<?php

class Controller_Site_Base extends \Fuel\Core\Controller_Template
{
	/**
	* @var string page template
	*/
	public $template = 'site/layouts/template';

	public function before()
	{
		parent::before();

		// Set a global variable so views can use it
		//$this->template->set_global('current_user', $this->current_user);
        //$this->template->header = \Parser\View_Smarty::forge('site/layouts/header.tpl');
        //$this->template->footer = \Parser\View_Smarty::forge('site/layouts/footer.tpl');
        //$this->template->footer = 'test';
	}

}
