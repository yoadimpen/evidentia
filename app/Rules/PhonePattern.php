<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhonePattern implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //return $value => 'regex:^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$'; //A ESTO LE SALE ERROR
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El teléfono es obligatorio y debe tener el formato: +(YYY) XXX XX XX XX siendo el código YYY opcional y de longitud variable entre 0 y 3 dígitos.';
    }
}
