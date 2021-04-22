<?php declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;

final class PurchaseCompleted extends Mailable
{
    /**
     * @return $this
     */
    public function build(): self
    {
        return $this->view('email.purchase_completed');
    }
}
