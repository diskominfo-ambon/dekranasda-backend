<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'categories' => 'required',
            'attachments' => 'required',
            'price' => 'required'
        ];
    }


    public function attributes()
    {
        return [
            'title' => 'Nama produk',
            'content' => 'Deskripsi produk',
            'price' => 'Harga',
            'categories' => 'Kategori',
            'attachments' => 'Unggahan produk'
        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute wajib untuk dimasukan'
        ];
    }


    public function validationData()
    {
        return $this->except(['attachments', 'categories']);
    }
}


