<?php
namespace ProfiCloS\OpenStack;

use Nette\DI\CompilerExtension;

class OpenStackExtension extends CompilerExtension
{

	private $defaults = [
		'authVersion' => OpenStack::AUTH_VERSION_3,
		'authUrl' => null,
		'region' => null,
		'userId' => null,
		'password' => null,
		'projectId' => null,
	];

	public function loadConfiguration(): void
	{
		$this->validateConfig($this->defaults);

		$builder = $this->getContainerBuilder();
		$builder->addDefinition($this->prefix('auth'))
			->setFactory(OpenStack::class, [
				$this->config['authVersion'],
				$this->config['authUrl'],
				$this->config['region'],
				$this->config['userId'],
				$this->config['password'],
				$this->config['projectId']
			]);
	}

}