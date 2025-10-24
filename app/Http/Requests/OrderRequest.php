<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'invoice_number'   => ['required','string','max:100'],
            'customer_id'      => ['required','exists:customers,id'],
            'delivery_address' => ['required','string','max:255'],
            'notes'            => ['nullable','string','max:1000'],
            'status'           => ['required','in:ordered,processed,routed,delivered,cancelled'],
        ];
    }
}
