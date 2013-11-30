<?php

namespace PHP\Lang;

class ArrayObject extends \ArrayObject implements ObjectInterface {
	
	public function __construct() {
		$argc = func_num_args();
		$argv = func_get_args();
		if($argc == 1 && is_array($argv[0])) {
			parent::__construct($argv[0]);
		} else if($argc == 1 && $argv[0] instanceof ArrayObject) {
			parent::__construct($argv[0]->getArrayCopy());
		} else {
			parent::__construct($argv);
		}
	}
	
	static public function alias($alias, $autoload = TRUE) {
		return class_alias ( get_called_class() , $alias , $autoload);
	}
	
	static public function getClassName() {
		return get_called_class();
	}
	
	static public function getClassMethods() {
		return get_class_methods(get_called_class());
	}
	
	static public function getClassVars() {
		return get_class_vars(get_called_class());
	}
	
	public function getVars() {
		return get_object_vars($this);
	}
	
	static public function getParentClass() {
		return get_parent_class(get_called_class());
	}
	
	public function offsetGet($index) {
		if($this->offsetExists($index)) {
			return parent::offsetGet($index);
		} else {
			return array_column($this->getArrayCopy(), $index);
		}
	}
	
	public function combine($keys) {
		return new ArrayObject(array_combine($keys, $this->getArrayCopy()));
	}
	
	public function combineTo($values) {
		return new ArrayObject(array_combine($this->getArrayCopy(), $values));
	}
	
	public function toPrimitiveArray() {
		$array = $this->getArrayCopy();
		foreach($array as $k=>$v) {
			if($v instanceof ArrayObject) $array[$k] = $v->toPrimitiveArray();
		}
		return $array;
	}
	
	public function get($field) {
		return $this[$field];
	}
}