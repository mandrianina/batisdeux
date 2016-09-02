<?php

namespace Batis\CrowdsourcingBundle\Slugify;

class BatisSlugify
{
	/**
	 * Transforme un texte en slug
	 * 
	 * @param string $text
	 * @return string
	 */
	public function toSlug($text)
	{
		$text = preg_replace('/\W+/', '-', $text);

		$text = strtolower(trim($text, '-'));

		return $text;
	}

}