<?php

namespace PHP\Lang;

class ArrayObjectTest extends \PHPUnit_Framework_TestCase {

	function setUp() {
	}

	public function test() {

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
