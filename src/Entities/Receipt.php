<?php

namespace NeEET\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity()
 */
class Receipt
{

	use Identifier;
	use Timestampable;


	/**
	 * @ORM\OneToOne(targetEntity="RequestRecord", mappedBy="receipt", cascade={"persist"})
	 * @var RequestRecord
	 */
	protected $request;

	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	protected $fik;


	/**
	 * @param string $fik
	 */
	public function __construct($fik)
	{
		$this->fik = $fik;
	}


	/**
	 * @return RequestRecord
	 */
	public function getRequest()
	{
		return $this->request;
	}


	/**
	 * @internal
	 * @param RequestRecord $request
	 */
	public function setRequest(RequestRecord $request)
	{
		$this->request = $request;
	}


	/**
	 * @return string
	 */
	public function getFik()
	{
		return $this->fik;
	}


	/**
	 * @return bool
	 */
	public function isTestingDeviceID()
	{
		return substr($this->fik, -2, 2) === 'ff';
	}

}
