<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

use  App\Rules\PriceRule;

class AlbomRequest extends FormRequest
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
    public function rules(Request $request)
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required',
                    'price_before' => ['required','numeric', new PriceRule($request->price_after)],
                    'price_after' => 'required|numeric',
                    'main_image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
                    'images' => 'required|array',
                    'images.*' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'type' => 'required|in:public,private'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'title' => 'required',
                    'price_before' => ['required','numeric', new PriceRule($request->price_after)],
                    'price_after' => 'required|numeric',
                    'main_image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
                    'images' => 'nullable|array',
                    'images.*' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
                    'type' => 'required|in:public,private'
                ];

            }
            default:break;

        }
    }
}
