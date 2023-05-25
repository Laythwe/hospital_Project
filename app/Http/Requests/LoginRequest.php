<?php

namespace App\Http\Requests;

use App\Rules\PasswordRule1;
use App\Rules\UsernameRule1;
use App\Rules\UsernameRule2;
use App\Rules\UsernameRule3;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "username"=>["required",
                        "max:20", 
                        new UsernameRule1(),
                        new UsernameRule2() ,
                        new UsernameRule3()  ,
                         ],
            "password"=> ["required", "min:4", "numeric"],
        
        ];
    }
} 
