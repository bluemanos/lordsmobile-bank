<?php

namespace App\Http\Requests;

use App\Model\Resource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResourceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nick' => ['required'],
            'bank' => ['required', 'exists:banks,id'],
            'amount' => ['required', 'integer'],
            'rss' => [Rule::in(Resource::TYPES)],
        ];
    }
}
