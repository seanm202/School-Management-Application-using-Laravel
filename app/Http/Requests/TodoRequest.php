<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'yes_or_no'  => 'required|integer',
            'userId' => 'required|exists:users,userId',
            'userRole'   => 'required|integer|exists:roles,roleId',
            'todaysDate' =>'required|date|date_format:Y-m-d',
            'status'   => 'required|integer|exists:statuses,statusId',
            'batchId' =>'required|exists:batches,batchId',
        ];
    }
}
