<?php
namespace ProfiCloS\OpenStack\Identity;

interface IIdentity
{

	/**
	 * IIdentity constructor.
	 * @param $authUrl
	 * @param $region
	 * @param $userId
	 * @param $password
	 * @param $projectId
	 */
	public function __construct($authUrl, $region, $userId, $password, $projectId);

	/**
	 * @return array
	 */
	public function getOptions(): array;

}