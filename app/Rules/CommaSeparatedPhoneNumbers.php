<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommaSeparatedPhoneNumbers implements Rule
{
    public function passes($attribute, $value)
    {
        // Split the string by commas and validate each phone number
        $phoneNumbers = explode(',', $value);
        foreach ($phoneNumbers as $phone) {
            // Trim and validate the phone number (e.g., 7-10 digit numbers)
            if (!preg_match('/^[0-9]{7,10}$/', trim($phone))) {
                return false;
            }
        }
        return true;
    }

    public function message()
    {
        return 'Each phone number must be valid and contain between 7 to 10 digits.';
    }
}
