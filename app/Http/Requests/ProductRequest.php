<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

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
     * Create the default validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Factory  $factory
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function createDefaultValidator(ValidationFactory $factory)
    {
        return $factory->make(
            $this->all(), $this->container->call([$this, 'rules']),
            $this->messages(), $this->attributes()
        )->stopOnFirstFailure($this->stopOnFirstFailure);
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
            'categories' => 'required|array|min:2',
            'categories.*' => 'required',
            'attachments' => 'required|array|max:3',
            'attachments.*' => 'required|numeric',
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
            'categories.*' => 'Kategori ke',
            'attachments' => 'Unggahan produk',
            'attachments.*' => 'Unggahan produk ke '
        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute wajib untuk dimasukan',
            'min' => ':attribute setidaknya harus lebih dari :min',
            'max' => ':attribute setidaknya tidak harus lebih dari :max',
            'numeric' => ':attribute harus berupa nilai numerik',
            'array' => ':attribute harus berupa nilai tumpukan array'
        ];
    }


    public function validationData()
    {
        $user = $this->user();
        $status = Product::PENDING;

        if ($user->hasRole('admin')) {
            $status = Product::PUBLISHED;
        }

        return $this->merge(['status' => $status ])
            ->except(['attachments', 'categories']);
    }
}


