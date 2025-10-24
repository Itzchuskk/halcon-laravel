<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidencePhotoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'order_id'  => ['required','exists:orders,id'],
            'photo'     => ['required','file','image','max:4096'], // 4MB
            'photo_type'=> ['nullable','string','max:50'],
            'notes'     => ['nullable','string','max:255'],
        ];
    }
}
