<?php

namespace PHP\Lang;

class Foo extends Object {

}

class ObjectTest extends \PHPUnit_Framework_TestCase {

	function setUp() {
	}

	public function testAlias() {

		Object::alias('Foo');
		\Foo::alias('TestNS\Bar');

		$a = new Object;
		$b = new \Foo;
		$c = new \TestNS\Bar;

		$this->assertTrue($a == $b);
		$this->assertFalse($a === $b);
		$this->assertTrue($a instanceof $b);

		$this->assertTrue($a == $c);
		$this->assertFalse($a === $c);
		$this->assertTrue($a instanceof $c);

		$this->assertTrue($a instanceof Object);
		$this->assertTrue($a instanceof \Foo);
		$this->assertTrue($a instanceof \TestNS\Bar);

		$this->assertTrue($b instanceof Object);
		$this->assertTrue($b instanceof \Foo);
		$this->assertTrue($b instanceof \TestNS\Bar);

		$this->assertTrue($c instanceof Object);
		$this->assertTrue($c instanceof \Foo);
		$this->assertTrue($c instanceof \TestNS\Bar);

	}

	public function testGetClassName() {

		$this->assertEquals('PHP\Lang\Object', Object::getClassName());
		$this->assertEquals('PHP\Lang\Foo', Foo::getClassName());

	}

	public function testGetClassMethods() {

		$class_methods = Foo::getClassMethods();

		$this->assertEquals(array(
				'alias',
				'getClassName',
				'getClassMethods',
				'getClassVars',
				'getVars',
				'getParentClass'
		), $class_methods);

	}

	public function testGetClassVars() {

		$class_vars = Foo::getClassVars();

		$this->assertEquals(array(), $class_vars);

	}

	public function testGetClass() {

		$a = new Foo();
		$className = $a->getClassName();

		$this->assertEquals('PHP\Lang\Foo', $className);

	}

	public function testGetVars() {

		$a = new Foo();

		$this->assertEquals(array(), $a->getVars());

	}

	public function testGetParentClass() {

		$this->assertEquals('stdClass', Object::getParentClass());
		$this->assertEquals('PHP\Lang\Object', Foo::getParentClass());

	}
	
}
