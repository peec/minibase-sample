<?php
namespace app\events;

use Minibase\Wreqr\EventCollection;
use Minibase\Annotation;

class AppEvents extends EventCollection{

	/**
	 * Override 404 exception.
	 * 
	 * @Annotation\Event("mb:exception:RouteNotFoundException")
	 */
	public function RouteNotFound ($request) {
		return function () use ($request) {
			return $this->respond("html")
			->view("404.html", array('request' => $request))
			->with(404);
		};
	}
	
	/**
	 * CSRF exception override. 
	 *
	 * @Annotation\Event("csrf:invalid")
	 */
	public function CsrfTokenIsInvalid ($request) {
		return function () use ($request) {
			return $this->respond("html")
			->view("csrfFailure.html", array('request' => $request))
			->with(404);
		};
	}
}