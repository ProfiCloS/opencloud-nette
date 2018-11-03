<?php
namespace ProfiCloS\OpenStack\Identity;

abstract class Identity implements IIdentity
{

	protected $authUrl;
	protected $region;
	protected $userId;
	protected $password;
	protected $projectId;

	public function __construct($authUrl, $region, $userId, $password, $projectId)
	{
		$this->authUrl = $authUrl;
		$this->region = $region;
		$this->userId = $userId;
		$this->password = $password;
		$this->projectId = $projectId;
	}

}