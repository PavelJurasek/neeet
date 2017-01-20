<?php

namespace NeEET\FIK\Formatters;

use NeEET\Entities\Receipt;
use NeEET\FIK\ResponseFormatter;

class XmlFormatter implements ResponseFormatter
{

	/**
	 * @param Receipt $receipt
	 *
	 * @return mixed
	 */
	public function format(Receipt $receipt)
	{
		$template = '<response><fik>%s</fik></response>';

		return sprintf($template, $receipt->getFik());
	}

}
