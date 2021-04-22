<?php declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Mail\PurchaseCompleted;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @return void
     */
    public function test_example()
    {
        Mail::fake();

        $requestBody = [
            'email' => $this->faker->email,
        ];

        $response = $this->postJson(route('purchase'), $requestBody);
        $response->assertStatus(200);

        Mail::assertSent(PurchaseCompleted::class);
    }
}
