<?php

namespace Tests\Unit;

use App\Exceptions\MatrixValidationException;
use PHPUnit\Framework\TestCase;
use App\Services\MartrixOperationService;

class MatrixOperationServiceTest extends TestCase
{
    /** @test */
    public function test_multiply_matrices_with_un_standard_arrays_will_throw_matrix_operation_exception()
    {
        $service = new MartrixOperationService();
        $this->expectException(MatrixValidationException::class);
        $m1 = [
            [1, 2, 2],
            [3, 4, 3]
        ];
        $m2 = [
            [1, 2],
            [3, 4]
        ];
        $data = $service->multiply($m1, $m2);
    }

    /** @test */
    public function test_multiply_matrices_with__arrays_will_return_values_as_characters()
    {
        $service = new MartrixOperationService();
        $m1 = [
            [1, 2],
            [3, 4]
        ];
        $m2 = [
            [1, 2],
            [3, 4]
        ];
        $result = [
            ['G', 'J'],
            ['O', 'V']
        ];
        $data = $service->multiply($m1, $m2);
        $this->assertIsArray($data);
        $this->assertEquals($result, $data);
    }
}
