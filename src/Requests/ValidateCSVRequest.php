<?php

namespace App\Requests;

class ValidateCSVRequest
{
    /**
     * Attempting to read an invalid file throws an exception
     * 
     */
    public function validate(string $filepath) : bool
    {
        if ( ! file_exists($filepath) )
        {
            return false;
        }

        return true;
    }
}