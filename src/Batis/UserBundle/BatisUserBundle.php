<?php

namespace Batis\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BatisUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
