<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\PurchaseCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class PurchaseController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        Mail::to($request->input('email'))->send(new PurchaseCompleted());

        return [];
    }
}
