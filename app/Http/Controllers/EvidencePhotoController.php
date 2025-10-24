<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidencePhotoRequest;
use App\Models\EvidencePhoto;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class EvidencePhotoController extends Controller
{
    public function store(EvidencePhotoRequest $request)
    {
        $order = Order::findOrFail($request->order_id);

        $path = $request->file('photo')->store('evidence', 'public');

        EvidencePhoto::create([
            'order_id'   => $order->id,
            'user_id'    => auth()->id(),
            'photo_path' => $path,
            'photo_type' => $request->input('photo_type'),
            'notes'      => $request->input('notes'),
        ]);

        return redirect()->route('orders.show', $order);
    }

    public function destroy(EvidencePhoto $evidence)
    {
        if ($evidence->photo_path && Storage::disk('public')->exists($evidence->photo_path)) {
            Storage::disk('public')->delete($evidence->photo_path);
        }
        $order = $evidence->order;
        $evidence->delete();
        return redirect()->route('orders.show', $order);
    }
}
