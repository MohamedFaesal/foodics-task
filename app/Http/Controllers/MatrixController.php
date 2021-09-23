<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatrixMultiplicationRequest;
use App\Services\MartrixOperationService;

class MatrixController extends Controller
{
    private MartrixOperationService $martrixOperationService;

    public function __construct(MartrixOperationService $martrixOperationService)
    {
        $this->martrixOperationService = $martrixOperationService;
    }

    public function matrixMultiplication(MatrixMultiplicationRequest $request)
    {
        $matrices = $request->validated();
        $result = $this->martrixOperationService->multiply($matrices['matrix1'], $matrices['matrix2']);
        return response()->json([
            'data' => $result
        ]);
    }
}
