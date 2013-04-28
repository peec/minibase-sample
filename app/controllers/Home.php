<?php
namespace app\controllers;

use Minibase\Mvc\Controller;

use app\models\News;

use Minibase\Annotation;

use Pkj\Minibase\Plugin\AuthPlugin\Annotation as Restrict;

class Home extends Controller {
	
	/**
	 * This annotation will work in production mode. See the .htacess file in the www folder to set app mode to production.
	 * @Annotation\CachedCall(key="homepage", expire=30)
	 */
	public function index () {
		$em = $this->mb->em;
		// Entity manager
		$newsRepository = $em->getRepository('app\models\News');
		$news = $newsRepository->findAll();
		
		return $this->respond("html")
			->view('home.html', array('news' => $news));
	}
	
	public function createNews () {
		
		$news = new News();
		$news->setTitle($_POST['title']);
		$this->mb->em->persist($news);
		
		$this->mb->em->flush();
		return $this->respond("redirect")
			->to($this->call('app/controllers/Home.index')->reverse()->url);
	}
	
	
	
}