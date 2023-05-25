<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class UsernameRule3 implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   Log::channel('customlog')->info("success");
        if(!ctype_lower(substr($value, 2 , -4)))  {
            Log::channel('customlog')->info("fail");
            $fail('The :attribute must have at least one lower case.');
        }
    }
}
