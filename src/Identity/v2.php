<?php
namespace ProfiCloS\OpenStack\Identity;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use OpenStack\Common\Transport\Utils;
use OpenStack\Identity\v2\Service;

class v2 extends Identity
{

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		$httpClient = new Client([
			'base_uri' => Utils::normalizeUrl($this->authUrl),
			'handler'  => HandlerStack::create(),
		]);

		return [
			'authUrl' => $this->authUrl,
			'region'  => $this->region,
			'username' => $this->userId,
			'password'=> $this->password,
			'tenantId' => $this->projectId,
			'identityService' => Service::factory($httpClient),
		];
	}

}
