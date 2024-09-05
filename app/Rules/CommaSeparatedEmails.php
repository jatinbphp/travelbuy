<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CommaSeparatedEmails implements Rule
{
    public function passes($attribute, $value)
    {
        // Split the string by commas and validate each email
        $emails = explode(',', $value);
        foreach ($emails as $email) {
            if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                return false;
            }
        }
        return true;
    }

    public function message()
    {
        return 'Each email address must be valid and properly formatted.';
    }
}
