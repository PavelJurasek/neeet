<?php

namespace NeEET\FIK;

use NeEET\FIK\Formatters\JsonFormatter;
use NeEET\FIK\Formatters\RawFormatter;
use NeEET\FIK\Formatters\XmlFormatter;

class ResponseFormatterFactory
{

	/**
	 * @param string $format
	 *
	 * @return ResponseFormatter
	 */
	public function create($format)
	{
		switch ($format) {
			case 'xml':
				return new XmlFormatter;
				break;
			case '':
				return new RawFormatter;
			case 'json':
			default:
				return new JsonFormatter;
		}
	}

}
