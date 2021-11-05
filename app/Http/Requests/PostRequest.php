<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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


    public function originalRules()
    {
        return collect([
            'title' => ['required'],
            'content' => ['required'],
            'file' => ['required', 'image', 'mimes:png,jpg', 'size:512']
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->originalRules();

        if (strtolower($this->getMethod()) === 'put') {
            $rules->put(
                'file',
                ['image', 'mimes:png,jpg', 'size:512']
            );
        }

        return $rules->toArray();
    }


    public function attributes()
    {
        return [
            'title' => 'Judul',
            'content' => 'Deskripsi',
            'file' => 'Unggahan'
        ];
    }


    public function messages()
    {
        return [
            'required' => ':attribute wajib untuk dimasukan'
        ];
    }

    public function passedValidation()
    {
        $this->merge(['published' => $this->filled('published') ? now() : null]);
    }
}
