<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class PruebaTest1 extends TestCase {
    public function test_sumar(): void {
        $num1= 1;
        $num2= 2;

        $this->assertSame(3,$num1+$num2);
    }
}