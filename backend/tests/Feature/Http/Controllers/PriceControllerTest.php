<?php declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Throwable;

final class PriceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws Throwable
     */
    public function testInvoke()
    {
        $requestBody = [
            'isMember' => false,
            'showDate' => '2020-08-15',
            'showTime' => '14:25',
        ];

        $response = $this->postJson(route('price'), $requestBody);

        $response->assertStatus(200);
        $response->assertSee(1800);
    }

    /**
     * @throws Throwable
     */
    public function testInvoke_422()
    {
        $requestBody = [];
        $response = $this->postJson(route('price'), $requestBody);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'isMember',
            'showDate',
            'showTime',
        ]);
    }
}
