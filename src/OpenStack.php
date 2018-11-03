<?php
namespace ProfiCloS\OpenStack;

use OpenStack\OpenStack as OCOpenStack;
use ProfiCloS\OpenStack\Identity\v2;
use ProfiCloS\OpenStack\Identity\v3;

class OpenStack
{

	public const AUTH_VERSION_2 = 'v2.0';
	public const AUTH_VERSION_3 = 'v3.0';

	/** @var OCOpenStack */
	private $openStack;

	/**
	 * OpenStack constructor.
	 *
	 * @param $authVersion
	 * @param $authUrl
	 * @param $region
	 * @param $userId
	 * @param $password
	 * @param $projectId
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct($authVersion, $authUrl, $region, $userId, $password, $projectId)
	{
		if($authVersion === self::AUTH_VERSION_2) {
			$identity = new v2($authUrl, $region, $userId, $password, $projectId);
		} elseif($authVersion === self::AUTH_VERSION_3) {
			$identity = new v3($authUrl, $region, $userId, $password, $projectId);
		} else {
			throw new InvalidArgumentException('Unsupported auth version');
		}
		$this->openStack = new OCOpenStack($identity->getOptions());
	}

	/**
	 * Creates a new Compute v2 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Compute\v2\Service
	 */
	public function computeV2(array $options = []): \OpenStack\Compute\v2\Service
	{
		return $this->getOpenStack()->computeV2($options);
	}

	/**
	 * Creates a new Networking v2 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Networking\v2\Service
	 */
	public function networkingV2(array $options = []): \OpenStack\Networking\v2\Service
	{
		return $this->getOpenStack()->networkingV2($options);
	}

	/**
	 * Creates a new Networking v2 Layer 3 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Networking\v2\Extensions\Layer3\Service
	 */
	public function networkingV2ExtLayer3(array $options = []): \OpenStack\Networking\v2\Extensions\Layer3\Service
	{
		return $this->getOpenStack()->networkingV2ExtLayer3($options);
	}

	/**
	 * Creates a new Networking v2 Layer 3 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Networking\v2\Extensions\SecurityGroups\Service
	 */
	public function networkingV2ExtSecGroups(array $options = []): \OpenStack\Networking\v2\Extensions\SecurityGroups\Service
	{
		return $this->getOpenStack()->networkingV2ExtSecGroups($options);
	}

	/**
	 * Creates a new Identity v2 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Identity\v2\Service
	 */
	public function identityV2(array $options = []): \OpenStack\Identity\v2\Service
	{
		return $this->getOpenStack()->identityV2($options);
	}

	/**
	 * Creates a new Identity v3 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Identity\v3\Service
	 */
	public function identityV3(array $options = []): \OpenStack\Identity\v3\Service
	{
		return $this->getOpenStack()->identityV3($options);
	}

	/**
	 * Creates a new Object Store v1 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\ObjectStore\v1\Service
	 */
	public function objectStoreV1(array $options = []): \OpenStack\ObjectStore\v1\Service
	{
		return $this->getOpenStack()->objectStoreV1($options);
	}

	/**
	 * Creates a new Block Storage v2 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\BlockStorage\v2\Service
	 */
	public function blockStorageV2(array $options = []): \OpenStack\BlockStorage\v2\Service
	{
		return $this->getOpenStack()->blockStorageV2($options);
	}

	/**
	 * Creates a new Images v2 service.
	 *
	 * @param array $options options that will be used in configuring the service
	 *
	 * @return \OpenStack\Images\v2\Service
	 */
	public function imagesV2(array $options = []): \OpenStack\Images\v2\Service
	{
		return $this->getOpenStack()->imagesV2($options);
	}

	/**
	 * Creates a new Gnocchi Metric service v1.
	 *
	 * @param array $options
	 *
	 * @return \OpenStack\Metric\v1\Gnocchi\Service
	 */
	public function metricGnocchiV1(array $options = []): \OpenStack\Metric\v1\Gnocchi\Service
	{
		return $this->getOpenStack()->metricGnocchiV1($options);
	}

	private function getOpenStack(): OCOpenStack
	{
		return $this->openStack;
	}

}