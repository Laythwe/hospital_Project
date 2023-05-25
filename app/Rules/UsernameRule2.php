<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class UsernameRule2 implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   Log::channel('customlog')->info("success");
        if(!ctype_upper(substr($value, 0, 2)) )  {
            Log::channel('customlog')->info("fail");
            $fail('The first two :attribute must be uppercase.');
        }
    }
}
