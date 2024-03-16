<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailSena implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rule =  preg_match('/^([a-z0-9_\.-]+)@misena\.edu\.com$/', $value);

        if($rule === 0){
            $fail('El correo debe terminar en @misena.edu.com');
        }
    }
}
