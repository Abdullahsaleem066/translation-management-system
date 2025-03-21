<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $locale = $this->route('locale');

        return [
            'code' => 'sometimes|string|max:10|unique:locales,code,' . $locale->id,
            'name' => 'sometimes|string|max:50',
        ];
    }
}
