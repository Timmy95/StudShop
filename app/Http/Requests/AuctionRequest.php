<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuctionRequest extends Request
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
            'title' => 'required|min:4',
        	'body' => 'required|max:1000',
        	//'image' => 'required',
        	'price' => 'required|max:5'
        ];
    }
}
