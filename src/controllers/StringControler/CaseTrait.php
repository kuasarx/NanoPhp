<?php
// Case related methods

trait CaseTrait
{

    // Method to convert the string to lowercase
    public function toLowerCase()
    {
        return strtolower($this->string);
    }

    // Method to convert the string to uppercase
    public function toUpperCase()
    {
        return strtoupper($this->string);
    }

    // Method to convert a string to title case (capitalize the first letter of each word)
    public function titleCase()
    {
        return ucwords(strtolower($this->string));
    }

    // Method to convert the string to a camelCase representation
    public function toCamelCase()
    {
        $words = preg_split('/[^a-zA-Z0-9]+/', $this->string);
        $words = array_map('ucfirst', array_map('strtolower', $words));
        return lcfirst(implode('', $words));
    }

    // Method to return an UpperCamelCase version of the supplied string
    public function toUpperCamelCase()
    {
        $words = preg_split('/[^a-zA-Z0-9]+/', $this->string);
        $upperCamelCase = '';

        foreach ($words as $word) {
            $upperCamelCase .= ucfirst(strtolower($word));
        }

        return $upperCamelCase;
    }


    // Method to convert the string to a valid variable name (camelCase)
    public function toValidVariableName()
    {
        $words = preg_split('/[^a-zA-Z0-9]+/', $this->string);
        $words = array_map('ucfirst', array_map('strtolower', $words));
        return lcfirst(implode('', $words));
    }

    // Method to convert the string to a valid class name (PascalCase)
    public function toValidClassName()
    {
        $words = preg_split('/[^a-zA-Z0-9]+/', $this->string);
        $words = array_map('ucfirst', array_map('strtolower', $words));
        return implode('', $words);
    }

    // Method to Returns a case swapped version of the string
    public function swapCase()
    {
        $caseSwapped = '';
        for ($i = 0; $i < strlen($this->string); $i++) {
            $char = $this->string[$i];
            if (ctype_lower($char)) {
                $caseSwapped .= strtoupper($char);
            } elseif (ctype_upper($char)) {
                $caseSwapped .= strtolower($char);
            } else {
                $caseSwapped .= $char;
            }
        }
        return $caseSwapped;
    }
}
