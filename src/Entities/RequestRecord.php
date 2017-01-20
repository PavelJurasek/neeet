<?php

namespace NeEET\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity()
 */
class RequestRecord
{

	use Identifier;
	use Timestampable;


	/**
	 * @ORM\OneToOne(targetEntity="Receipt", inversedBy="request", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=FALSE)
	 * @var Receipt
	 */
	protected $receipt;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected $userAgent;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected $httpRequestUrl;

	/**
	 * @ORM\Column(type="text", nullable=TRUE)
	 * @var string
	 */
	protected $httpAccept;

	/**
	 * @ORM\Column(type="text", nullable=TRUE)
	 * @var string
	 */
	protected $httpAcceptEncoding;

	/**
	 * @ORM\Column(type="text", nullable=TRUE)
	 * @var string
	 */
	protected $httpAcceptLanguage;


	/**
	 * @param Receipt $receipt
	 * @param string $userAgent
	 * @param string $httpRequestUrl
	 * @param string|NULL $httpAccept
	 * @param string|NULL $httpAcceptEncoding
	 * @param string|NULL $httpAcceptLanguage
	 */
	public function __construct(Receipt $receipt, $userAgent, $httpRequestUrl, $httpAccept, $httpAcceptEncoding, $httpAcceptLanguage)
	{
		$this->receipt = $receipt;
		$this->userAgent = $userAgent;
		$this->httpRequestUrl = $httpRequestUrl;
		$this->httpAccept = $httpAccept;
		$this->httpAcceptEncoding = $httpAcceptEncoding;
		$this->httpAcceptLanguage = $httpAcceptLanguage;

		$receipt->setRequest($this);
	}

}
