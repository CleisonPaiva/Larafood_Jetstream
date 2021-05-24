<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        //Exceção pelo id para editar o plano onde o id tem que ser diferente do id atual
        $id=$this->segment(3);

        return [
            'name'=>"required|min:3|max:255|unique:profiles,name,{$id},id",
            'description'=>'nullable|min:3|max:255',
        ];

    }
}
