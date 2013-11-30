<?php

namespace PHP\Lang;

class ArrayObjectTest extends \PHPUnit_Framework_TestCase {

	function setUp() {
	}
	
	public function testConstructor1() {
		
		$a = array('name', 'age');
		$b = new ArrayObject('name', 'age');
		$c = new ArrayObject($a);
		$d = new ArrayObject($b);
		
		$this->assertEquals('name', $a['0']);
		$this->assertEquals('name', $b['0']);
		$this->assertEquals('name', $c['0']);
		$this->assertEquals('name', $d['0']);
		
		$this->assertEquals('age', $a[1]);
		$this->assertEquals('age', $b[1]);
		$this->assertEquals('age', $c[1]);
		$this->assertEquals('age', $d[1]);
		
		$this->assertEquals('age', $b->get(1));
		$this->assertEquals('age', $c->get(1));
		$this->assertEquals('age', $d->get(1));
		
		$this->assertEquals('age', $b->get('1'));
		$this->assertEquals('age', $c->get('1'));
		$this->assertEquals('age', $d->get('1'));
		
		$this->assertEquals('name', $b->get(0));
		$this->assertEquals('name', $c->get(0));
		$this->assertEquals('name', $d->get(0));
		
	}

	public function testConstructor2() {

		$records = array(
				array(
						'id' => 2135,
						'first_name' => 'John',
						'last_name' => 'Doe',
				),
				array(
						'id' => 3245,
						'first_name' => 'Sally',
						'last_name' => 'Smith',
				),
				array(
						'id' => 5342,
						'first_name' => 'Jane',
						'last_name' => 'Jones',
				),
				array(
						'id' => 5623,
						'last_name' => 'Doe',
				)
		);

		$array = new ArrayObject($records);

		$first_names = $array['first_name'];
		$this->assertEquals(array
				(
						'John',
						'Sally',
						'Jane',
						//'Peter'
				), $first_names);

	}

}
