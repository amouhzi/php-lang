<?php

namespace PHP\Lang;

interface ObjectInterface {
	static public function alias($alias, $autoload = TRUE);
	
	static public function getClassName();
	
	static public function getClassMethods();
	
	static public function getClassVars();
	
	public function getVars();
	
	static public function getParentClass();
}