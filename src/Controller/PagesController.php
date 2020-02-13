<?php

class PagesController extends PagesController
{
	public function index()
	{
		$this->app->render('index.php');
	}

	public function contact()
	{
		$this->app->render('contact.php');
	}

	public function postcontact()
	{
		$errors=['yerbangag@yahoo.fr','yerbangag@yahoo.fr','yerbangag@yahoo.fr'];

		$emails=[];
		$validator=$app->validator;
		$validator->check('name','required');
		$validator->check('email','required');
		$validator->check('message','required');
		$validator->check('service','in',array_keys($emails));
		$errors=$validator->errors();

	}
}