<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\PriceCalculator;

final class PriceController extends Controller
{
    /**
     * @param PriceRequest $request
     * @return int
     */
    public function __invoke(PriceRequest $request): int
    {
        $priceCalculator = new PriceCalculator();

        return $priceCalculator->calculate(
            $request->input('isMember'),
            $request->input('showDate'),
            $request->input('showTime'),
        );
    }
}
