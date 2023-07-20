<?
// Condition checking methods.

trait CheckersTrait {

    // Method to get the encoding used by the string
    public function getEncoding()
    {
        return mb_detect_encoding($this->string);
    }
    
    // Method to check if the string starts with a given substring
    public function startsWith($substring)
    {
        return strncmp($this->string, $substring, strlen($substring)) === 0;
    }

    // Method to check if the string starts with any of the provided substrings
    public function startsWithAny($substrings)
    {
        if (!is_array($substrings)) {
            $substrings = [$substrings];
        }

        foreach ($substrings as $substring) {
            if ($this->startsWith($substring)) {
                return true;
            }
        }

        return false;
    }

    // Method to check if the string ends with a given substring
    public function endsWith($substring)
    {
        return substr($this->string, -strlen($substring)) === $substring;
    }

    // Method to check if the string ends with any of the given substrings
    public function endsWithAny(array $substrings)
    {
        foreach ($substrings as $substring) {
            if ($this->endsWith($substring)) {
                return true;
            }
        }
        return false;
    }

    // Method to check if the string is empty
    public function isEmpty()
    {
        return empty($this->string);
    }

    // Method to check if the string contains a substring
    public function contains($substring)
    {
        return strpos($this->string, $substring) !== false;
    }

    // Method to check if the string contains any substring from an array
    public function containsAny(array $substrings)
    {
        foreach ($substrings as $substring) {
            if ($this->contains($substring)) {
                return true;
            }
        }
        return false;
    }

    // Method to get the first occurrence of a substring
    public function firstOccurrence($substring)
    {
        $pos = strpos($this->string, $substring);
        return $pos !== false ? substr($this->string, 0, $pos + strlen($substring)) : '';
    }

    // Method to get the last occurrence of a substring
    public function lastOccurrence($substring)
    {
        $pos = strrpos($this->string, $substring);
        return $pos !== false ? substr($this->string, $pos) : '';
    }

    // Method to check if the string contains only alphabetic characters
    public function isAlpha()
    {
        return ctype_alpha($this->string);
    }

    // Method to check if the string contains only alphanumeric characters
    public function isAlphanumeric()
    {
        return ctype_alnum($this->string);
    }

    // Method to check if the string contains only digits
    public function isNumeric()
    {
        return ctype_digit($this->string);
    }

    // Method to check if the string is base64 encoded
    public function isBase64()
    {
        return base64_encode(base64_decode($this->string, true)) === $this->string;
    }

    // Method to check if the string contains only hexadecimal characters
    public function containsOnlyHexChars()
    {
        // Use ctype_xdigit() to check if the string contains only hexadecimal characters
        return ctype_xdigit($this->string);
    }

    // Method to check if the string contains only whitespace characters
    public function isWhitespace()
    {
        return ctype_space($this->string);
    }

    // Method to check if the string is a valid email address
    public function isEmail()
    {
        return filter_var($this->string, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Method to check if the string is a valid URL
    public function isUrl()
    {
        return filter_var($this->string, FILTER_VALIDATE_URL) !== false;
    }

    // Method to check if the string matches a regular expression
    public function matchesRegex($pattern)
    {
        return preg_match($pattern, $this->string) === 1;
    }

    // Method to check if the string is a palindrome (reads the same backward as forward)
    public function isPalindrome()
    {
        $reversed = strrev($this->string);
        return strtolower($this->string) === strtolower($reversed);
    }

    // Method to check if the string is a valid IPv4 address
    public function isIPv4()
    {
        return filter_var($this->string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }

    // Method to check if the string is a valid IPv6 address
    public function isIPv6()
    {
        return filter_var($this->string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }

    // Method to check if the string is a valid JSON format
    public function isJson()
    {
        json_decode($this->string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    // Method to check if the string is a valid UUID (Universal Unique Identifier)
    public function isUuid()
     {
         return preg_match('/^\h*{?[0-9a-f]{8}\h*-?\h*[0-9a-f]{4}\h*-?\h*4[0-9a-f]{3}\h*-?\h*[89ab][0-9a-f]{3}\h*-?\h*[0-9a-f]{12}\h*}?\h*$/i', $this->string) === 1;
     }

    // Method to check if the string is serialized
    public function isSerialized()
    {
        $data = @unserialize($this->string);
        return $data !== false || $this->string === 'b:0;' || strtolower($this->string) === 'n;';
    }

    // Method to check if the string contains a lowercase character
    public function containsLowerCaseChar()
    {
        // Use preg_match() to check for the presence of a lowercase character
        return preg_match('/[a-z]/', $this->string) === 1;
    }

    // Method to check if the string contains an uppercase character
    public function containsUpperCaseChar()
    {
        return preg_match('/[A-Z]/', $this->string) === 1;
    }

}