<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\DoctrineBehaviors\DI;

use Kdyby;
use Nette\DI\CompilerExtension;


class SoftDeletableExtension extends CompilerExtension
{
	use TClassAnalyzer;

	/** @var [] */
	protected $default = [
		'isRecursive' => TRUE,
		'trait' => 'Knp\DoctrineBehaviors\Model\SoftDeletable\SoftDeletable'
	];


	public function loadConfiguration()
	{
		$config = $this->getConfig($this->default);
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('listener'))
			->setClass('Knp\DoctrineBehaviors\ORM\SoftDeletable\SoftDeletableListener', [
				'@' . $this->getClassAnalyzer()->getClass(),
				$config['isRecursive'],
				$config['trait']
			])
			->setAutowired(FALSE)
			->addTag(Kdyby\Events\DI\EventsExtension::TAG_SUBSCRIBER);
	}

}