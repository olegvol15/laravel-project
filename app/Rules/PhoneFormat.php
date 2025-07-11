<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\+380 \d{2} \d{3} \d{2} \d{2}$/', $value)) {
            $fail(__('validation.custom.phone.regex'));
        }
    }
}
