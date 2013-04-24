<?php
namespace app\models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="news")
 */
class News {
	
	/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
	protected $id;
	/** @ORM\Column(type="string") **/
	protected $title;
	
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getTitle () {
		return $this->title;
	}
	
	public function getId () {
		return $this->id;
	}
	
}