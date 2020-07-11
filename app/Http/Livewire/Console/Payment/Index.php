<?php

namespace App\Http\Livewire\Console\Payment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaymentConfirmation;

class Index extends Component
{
    use WithPagination;

    public $search;

    /**
     * search
     */
    protected $updatesQueryString = ['search'];

    public function render()
    {
        if($this->search != "") {

            $payments = PaymentConfirmation::where('invoice', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $payments = PaymentConfirmation::latest()->paginate(10);

        }

        return view('livewire.console.payment.index', [
            'payments' => $payments
        ]);
    }
}
