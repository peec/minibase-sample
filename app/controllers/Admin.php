<?php
namespace app\controllers;

use Minibase\Mvc\Controller;
use app\models\News;
use Minibase\Annotation;
use Pkj\Minibase\Plugin\AuthPlugin\Annotation as Restrict;


/**
 * Auth plugin feature, here we allow only specific Usergroups. ( admin ).
 * This applies to all methods in this controller, but we could also do this on 
 * specific methods.
 * 
 * So we annotatate this controller like so:
 * 
 * @Restrict\UserGroups(groups={"admin"})
 */
class Admin extends Controller {
	
	public function index () {
		
		return $this->respond("html")
			->view("admin/index.html");
	}
	
	
	
}