<?php

namespace NeEET\FIK\Formatters;

use NeEET\Entities\Receipt;
use NeEET\FIK\ResponseFormatter;

class JsonFormatter implements ResponseFormatter
{

	/**
	 * @param Receipt $receipt
	 *
	 * @return mixed
	 */
	public function format(Receipt $receipt)
	{
		return [
			'fik' => $receipt->getFik(),
		];
	}

}
