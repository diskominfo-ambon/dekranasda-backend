<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * Get the validation original rules that apply to the request.
     *
     * @return \Illuminate\Support\Collection
     */
    public function originalRules()
    {
        return collect([
            'name' => ['required'],
            // 'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            // 'phone_number' => ['required', 'numeric', 'unique:users,phone_number'],
        ]);
    }

    /**
     * Get the validation mixin rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->originalRules();
        $user = $this->user();

        if (strtolower($this->getMethod()) === 'put') {
            $rules->forget('password');

            $rules->put('email', [
                'required',
                'email',
                Rule::unique(User::class)
                    ->ignore($user->email, 'email')
            ])->put('phone_number', [
                'required',
                'numeric',
                Rule::unique(User::class)
                    ->ignore($user->phone_number, 'phone_number')
            ]);
        }

        return $rules->toArray();
    }

    public function passedValidation()
    {
        if ($this->filled('new_password')) {
            $this->merge(['password' => bcrypt($this->new_password)]);
        }
    }
}
