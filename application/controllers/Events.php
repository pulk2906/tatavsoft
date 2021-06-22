<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

function __construct()
    {
		
        parent::__construct();
		$this->load->model('Events_model');

    }
	
	
	 
	public function index()
	{
		$this->load->view('events');
	}

	public function insertevent()
	{

		$this->Events_model->insertevent();
	}

	public function viewevents(){

		$this->load->view('viewevents');

	}
	public function getevents()
	{

		$this->Events_model->getevents();
	}

	public function deleteevents()
	{

		$this->Events_model->deleteevents();
	}

	public function editevent()
	{

		$this->Events_model->editevent();
	}


}
