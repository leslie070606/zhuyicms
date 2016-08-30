<?php
/*
namespace common\atm;

class Queue extends MemcacheQ{
	private $_ns = "ZY_ATM_E_";
	
	public function push($event,$param){
		return $this->input($this->_getQ($event),$param);
	}

	public function pop($event){
		return $this->output($this->_getQ($event));
	}

	private function _getQ($event){
		return $this->_ns . $event;
	}
}
*/
