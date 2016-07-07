<?php
namespace frontend\services\order;

abstract class State{
	protected $order = null;

	public function __construct(\frontend\services\order\Base $order){
		assert($order != null);
		$this->order = $order;
	}
}
