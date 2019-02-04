[![GitHub version](https://badge.fury.io/gh/ProfiCloS%2Fopenstack-nette.svg)](https://badge.fury.io/gh/ProfiCloS%2Fopenstack-nette)
[![travis-ci.com](https://travis-ci.com/ProfiCloS/openstack-nette.svg?branch=master)](https://travis-ci.com/ProfiCloS/openstack-nette)

# OpenStack for Nette Framework

# Install with composer
```sh
$ composer require proficlos/openstack-nette
```

# How to use
Enable extension using neon
```yml
extensions:
	openstack: ProfiCloS\OpenStack\OpenStackExtension
```

Configure credentials
```yml
openstack:
	authVersion: v2.0
	authUrl: https://auth.cloud.ovh.net/v2.0/
	region: REGION
	userId: userIdentificator
	password: password
	projectId: projectTenant
```

Inject in presenter
```php
/** @var \ProfiCloS\OpenStack @inject */
public $openStack;
```

Prepare and next usage is by [php-opencloud/openstack](https://github.com/php-opencloud/openstack/) 
```php
/* object store */
$objectStorage = $this->openStack->objectStoreV1();

/* compute */
$compute = $this->openStack->computeV2();

/* networking */
$compute = $this->openStack->networkingV2();

/* images */
$compute = $this->openStack->imagesV2();

/* 
   and others ...
*/

/* or returns full php-opencloud/openstack */
$openStack = $this->openStack->getOpenStack();
```


# Buy us a coffee <3
[![Buy me a Coffee](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E8NK53NGKVDHS)

# Donate us <3
```
ETH: 0x7D771A56735500f76af15F589155BDC91613D4aB
UBIQ: 0xAC08C7B9F06EFb42a603d7222c359e0fF54e0a13
```

