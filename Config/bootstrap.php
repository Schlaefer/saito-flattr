<?php

	//= don't activate on CLI-tests
	if (php_sapi_name() === 'cli') {
		return;
	}

	App::uses('FlattrRenderer', 'Flattr.Lib');

	$settings = Saito\Plugin::loadConfig('Flattr');
	SaitoEventManager::getInstance()->attach(new FlattrRenderer($settings));
