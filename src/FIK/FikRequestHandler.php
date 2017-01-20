<?php

namespace NeEET\FIK;

use Kdyby\Doctrine\EntityManager;
use NeEET\Entities\Receipt;
use NeEET\Entities\RequestRecord;
use Nette\Http\Request;
use Ramsey\Uuid\Uuid;


class FikRequestHandler
{

	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * @var Request
	 */
	private $httpRequest;


	/**
	 * @param EntityManager $entityManager
	 * @param Request $httpRequest
	 */
	public function __construct(EntityManager $entityManager, Request $httpRequest)
	{
		$this->entityManager = $entityManager;
		$this->httpRequest = $httpRequest;
	}


	/**
	 * @return Receipt
	 */
	public function generate()
	{
		$uuid = Uuid::uuid4();

		$deviceId = str_pad(dechex(mt_rand(0, 254)), 2, '0', STR_PAD_LEFT); // 254 - do not include FF

		$fik = $uuid->toString().'-'.$deviceId;

		$receipt = new Receipt($fik);

		$request = new RequestRecord(
			$receipt,
			$this->httpRequest->getHeader('User-Agent'),
			(string) $this->httpRequest->getUrl(),
			$this->httpRequest->getHeader('Accept'),
			$this->httpRequest->getHeader('Accept-Encoding'),
			$this->httpRequest->getHeader('Accept-Language')
		);

		$this->entityManager->persist($receipt);
		$this->entityManager->persist($request);

		$this->entityManager->flush();

		return $receipt;
	}

}
