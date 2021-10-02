<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $id = $this->route('role');

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
                    'name' => 'required|unique:roles,name',
                    'permissions' => 'required|array',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'name' => 'required|unique:roles,name,'.$id,
                    'permissions' => 'required|array',
                ];

            }
            default:break;

        }
    }
}
