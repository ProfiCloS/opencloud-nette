<?php
use ProfiCloS\OpenStack\OpenStack;

require_once __DIR__ . '/../vendor/autoload.php';
if(!file_exists(__DIR__ . '/testAuth.ini')) {
	throw new Exception('Test authorization file \'testAuth\' not exist!');
}
ini_set('display_errors', 1);
$configuration = parse_ini_file(__DIR__ . '/testAuth.ini');

$openStack = new OpenStack(OpenStack::AUTH_VERSION_2, $configuration['AUTH_URL'], $configuration['REGION'], $configuration['USER'], $configuration['PASSWORD'], $configuration['PROJECTID']);

$service = $openStack->objectStoreV1();

foreach ($service->listContainers() as $container) {
	/** @var $container \OpenStack\ObjectStore\v1\Models\Container */
	var_dump($container);
}
