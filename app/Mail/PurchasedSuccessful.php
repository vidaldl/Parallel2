<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class PurchasedSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $charge;
    public $email;
    public $date;
    public $receipt;
    public $name;
    public $items;
    public $subtotal;
    public $tax;
    public $total;
    public $method;
    public $cardtype;
    public $cardlast4;
    public $receipt_info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($charge, $email, $date, $receipt, $name, $items, $subtotal, $tax, $total, $method, $cardtype, $cardlast4, $receipt_info)
    {
        $this->charge = $charge;
        $this->email = $email;
        $this->date = $date;
        $this->receipt = $receipt;
        $this->name = $name;
        $this->items = $items;
        $this->subtotal = $subtotal;
        $this->tax = $tax;
        $this->total = $total;
        $this->method = $method;
        $this->cardtype = $cardtype;
        $this->cardlast4 = $cardlast4;
        $this->receipt_info = $receipt_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.purchased')->with([
        'charge'  => $this->charge,
        'email'  => $this->email,
        'date'  => $this->date,
        'receipt'  => $this->receipt,
        'name'  => $this->name,
        'items'  => $this->items,
        'subtotal'  => $this->subtotal,
        'tax'  => $this->tax,
        'total'  => $this->total,
        'method'  => $this->method,
        'cardtype'  => $this->cardtype,
        'cardlast4'  => $this->cardlast4,
        'receipt_info' => $this->receipt_info
        ]);
    }
}
