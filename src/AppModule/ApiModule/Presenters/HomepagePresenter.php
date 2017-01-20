<?php

namespace NeEET\AppModule\ApiModule\Presenters;

use NeEET\FIK\FikRequestHandler;
use NeEET\FIK\ResponseFormatterFactory;
use Nette\Application\Responses\TextResponse;
use Nette\Application\UI\Presenter;


class HomepagePresenter extends Presenter
{

	/**
	 * @var ResponseFormatterFactory
	 */
	private $responseFormatterFactory;

	/**
	 * @var FikRequestHandler
	 */
	private $fikRequestHandler;


	/**
	 * @param ResponseFormatterFactory $responseFormatterFactory
	 * @param FikRequestHandler $fikRequestHandler
	 */
	public function __construct(ResponseFormatterFactory $responseFormatterFactory, FikRequestHandler $fikRequestHandler)
	{
		parent::__construct();

		$this->responseFormatterFactory = $responseFormatterFactory;
		$this->fikRequestHandler = $fikRequestHandler;
	}


	/**
	 * @param string $version
	 * @param string $format
	 */
	public function actionDefault($version, $format)
	{
		$formatter = $this->responseFormatterFactory->create($format);

		$receipt = $this->fikRequestHandler->generate();

		$this->send($formatter->format($receipt), $format);
	}


	/**
	 * @param mixed $response
	 * @param string $format
	 */
	private function send($response, $format)
	{
		switch ($format) {
			case 'xml':
				$this->getHttpResponse()->setContentType('text/xml', 'utf-8');
				$this->sendResponse(new TextResponse($response));
				break;

			case '':
				$this->sendResponse(new TextResponse($response));
				break;

			case 'json':
			default:
				$this->sendJson($response);
				break;
		}
	}

}
