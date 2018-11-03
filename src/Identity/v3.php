<?php
namespace ProfiCloS\OpenStack\Identity;

class v3 extends Identity
{

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		return [
			'authUrl' => $this->authUrl,
			'region'  => $this->region,
			'user' => [
				'id' => $this->userId,
				'password'=> $this->password
			],
			'scope'   => [
				'project' => [
					'id' => $this->projectId
				]
			]
		];
	}

}
