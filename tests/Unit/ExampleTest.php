<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ExampleTest extends BaseTestCase
{
    /**
     * A basic test example.
     */
    #[Test]
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}
