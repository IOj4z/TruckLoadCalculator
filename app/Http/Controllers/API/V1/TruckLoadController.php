<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TruckLoadRequest;
use App\Services\TruckLoadCalculatorService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="Truck Load API", version="1.0.0")
 */
class TruckLoadController extends Controller
{
    protected $calculatorService;

    public function __construct(TruckLoadCalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function calculate(TruckLoadRequest $request)
    {
        $numCargoUnits = $request->input('numCargoUnits');
        $truckType = $request->input('truckType');

        $result = $this->calculatorService->calculateLoad($numCargoUnits, $truckType);

        return response()->json($result);
    }
}
