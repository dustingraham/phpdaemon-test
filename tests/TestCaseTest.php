<?php

class TestTestCase extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testClass()
    {
        $class = new \DustinGraham\ReactMysql\TestClass();

        $class->test();
    }
}
