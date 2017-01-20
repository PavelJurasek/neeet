<?php

namespace NeEET\FIK;

use NeEET\Entities\Receipt;

interface ResponseFormatter
{

	/**
	 * @param Receipt $receipt
	 *
	 * @return mixed
	 */
	public function format(Receipt $receipt);

}
