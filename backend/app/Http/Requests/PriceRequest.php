<?php declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class PriceRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'isMember' => ['required', 'boolean'],
            'showDate' => ['required', 'date_format:Y-m-d'],
            'showTime' => ['required', 'date_format:H:i'],
        ];
    }
}
