<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6|confirmed'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,'.auth()->user()->id,
                    'password' => 'nullable|min:6|confirmed'
                ];

            }
            default:break;

        }
    }
}
