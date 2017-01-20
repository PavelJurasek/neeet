<?php

namespace NeEET\FIK\Formatters;

use NeEET\Entities\Receipt;
use NeEET\FIK\ResponseFormatter;

class RawFormatter implements ResponseFormatter
{

	/**
	 * @param Receipt $receipt
	 *
	 * @return mixed
	 */
	public function format(Receipt $receipt)
	{
		return $receipt->getFik();
	}

}
