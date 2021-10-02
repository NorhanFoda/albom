<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $id = $this->route('employee');

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
                    'roles' => 'required|array',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$id,
                    'roles' => 'required|array',
                ];

            }
            default:break;

        }
    }
}
