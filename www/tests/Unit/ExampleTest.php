<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_first_test()
    {
        $a = 1;
        $b = 2;

        $c = $a + $b;

//        $this->assertSame('3', $c);
        $this->assertSame(3, $c);
    }
}
