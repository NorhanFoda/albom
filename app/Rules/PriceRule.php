<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceRule implements Rule
{
    private $price_after;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($price_after)
    {
        $this->price_after = $price_after;
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
        return $value > $this->price_after;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Price before must be greater than price after';
    }
}
