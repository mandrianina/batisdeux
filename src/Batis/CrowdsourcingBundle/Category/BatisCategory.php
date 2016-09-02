<?php

namespace Batis\CrowdsourcingBundle\Category;

class BatisCategory
{
	/**
	 * Recupère les catégories
	 * 
	 * @param string $text
	 * @return string
	 */
	public function getCategories($text)
	{
		$text = preg_replace('/\W+/', '-', $text);

		$text = strtolower(trim($text, '-'));

		return $text;
	}

}