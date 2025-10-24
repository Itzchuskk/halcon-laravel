<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PublicTrackController extends Controller
{
    public function show()
    {
        $order = null;
        if (request()->filled('invoice_number')) {
            $order = Order::with(['customer','evidencePhotos'])
                ->where('invoice_number', request('invoice_number'))
                ->first();
        }
        return view('public.track', compact('order'));
    }
}
