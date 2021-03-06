<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\DoctrineBehaviors\Contract\Loggable;


interface LoggerInterface
{

	/**
	 * @param string $message
	 */
	function process($message);

}
