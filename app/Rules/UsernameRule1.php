<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class UsernameRule1 implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        Log::channel('customlog')->info("success");
        if(!is_numeric(substr($value,-4,4))){
            Log::channel('customlog')->info("fail");
            $fail('The last 4 words of :attribute must be digit.');
        }
    }
}
