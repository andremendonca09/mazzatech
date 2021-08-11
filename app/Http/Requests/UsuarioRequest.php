<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Nao houve tempo para implementar acl
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method('post'))
            return [
                'nome' => 'required|min:2|max:255',
                'login' => 'required|min:2|max:50|unique:usuario,login',
                'senha' => 'required|min:8|confirmed',
                'situacao_usuario_id'=> 'required|exists:situacao_usuario,id',
            ];
        else
            return [
                'nome' => 'required|min:2|max:255',
                'login' => "required|min:2|max:50|unique:usuario,login,$usuario->id",
                'senha' => 'nullable|min:8|confirmed',
                'situacao_usuario_id'=> 'required|exists:situacao_usuario,id',
            ];
    }
}
