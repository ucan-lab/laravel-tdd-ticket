<?php declare(strict_types=1);

namespace App\Models;

final class PriceCalculator
{
    /**
     * @param bool $isMember
     * @param string $showDate
     * @param string $showTime
     * @return int
     */
    public function calculate(bool $isMember, string $showDate, string $showTime): int
    {
        if ($isMember) {
            return 1000;
        }

        if ($showDate) {


        }

        if ($showTime >= '20:05') {
            return 1300;
        }

        return 1800;
    }
}
