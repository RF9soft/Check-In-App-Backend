<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxWords implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $maxWords;
    
    public function __construct($maxWords)
    {
        $this->maxWords = $maxWords;
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
        $wordCount = str_word_count(strip_tags($value));

        return $wordCount <= $this->maxWords;
    }

    public function message()
    {
        return 'The :attribute must not exceed '.$this->maxWords.' words.';
    }
}
