<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Models\PriceCalculator;
use PHPUnit\Framework\TestCase;

final class PriceCalculatorTest extends TestCase
{
    /**
     * @param bool $isMember
     * @param string $showDate
     * @param string $showTime
     * @param int $expectedPrice
     * @dataProvider dataCalculator
     */
    public function testCalculator(bool $isMember, string $showDate, string $showTime, int $expectedPrice)
    {
        $priceCalculator = new PriceCalculator();
        $this->assertSame($expectedPrice, $priceCalculator->calculate($isMember, $showDate, $showTime));
    }

    /**
     * @return array
     */
    public function dataCalculator(): array
    {
        return [
            '非会員、平日（昼間）' => [
                'isMember' => false,
                'showDate' => '2020-04-22',
                'showTime' => '14:05',
                'expectedPrice' => 1800,
            ],
            '非会員、平日（レイト）' => [
                'isMember' => false,
                'showDate' => '2020-04-22',
                'showTime' => '20:05',
                'expectedPrice' => 1300,
            ],
            '会員、平日（昼間）' => [
                'isMember' => true,
                'showDate' => '2020-04-22',
                'showTime' => '14:05',
                'expectedPrice' => 1000,
            ],
        ];
    }
}
