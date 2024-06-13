<?php

namespace App\Services;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceService {
    public function createInvoice($order) {
        $client = new Party([
            'name'          => 'Kantin',
            'custom_fields' => [
                'seller'        => 'Pardapp',
                'phone'         => '+6282113765288',
                'email'         => 'daffa@gmail.com',
            ],
        ]);

        $customer = new Party([
            'name'          => $order->user->name,
            'address'       => $order->user->billingDetails->billing_address,
            'code'          => '#00A'.$order->id,
            'custom_fields' => [
                'email' => $order->user->email,
                'phone'         => $order->user->billingDetails->phone,
                'order number' => '#'. $order->id ,
            ],
        ]);

        foreach ($order->orderItems as $item) {
            $items[] = (new InvoiceItem())->title($item->product->name)->pricePerUnit($item->price)->quantity($item->quantity);
        }

        $invoice = Invoice::make('receipt')
       
        ->status(__('invoices::invoice.paid'))
        ->sequence(667)
        ->serialNumberFormat('{SEQUENCE}/{SERIES}')
        ->series('BIG')
            ->seller($client)
            ->buyer($customer)
            ->date($order->created_at)
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('Rp')
            ->currencyCode('IDR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . '-' . $customer->name)
            ->addItems($items)
            ->logo(public_path('vendor/invoices/logo.png'))
            ->save('public');

        $link = $invoice->url();

        return $invoice;
    }
}