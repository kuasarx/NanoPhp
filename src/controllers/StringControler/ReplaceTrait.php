<?
// String replace methods.

trait ReplaceTrait {
    
    // Method to replace a substring with another string
    public function replace($search, $replace)
    {
        return str_replace($search, $replace, $this->string);
    }

    // Method to remove whitespace from the beginning and end of the string
    public function trim()
    {
        return trim($this->string);
    }

    // Method to remove a specific substring from the string
    public function remove($substring)
    {
        return str_replace($substring, '', $this->string);
    }

    // Method to remove all occurrences of a specific character from the string
    public function removeAll($char)
    {
        return str_replace($char, '', $this->string);
    }

    // Method to remove the prefix $substring from the string, if present
    public function removePrefix($substring)
    {
        if (strpos($this->string, $substring) === 0) {
            return substr($this->string, strlen($substring));
        }
        return $this->string;
    }

    // Method to remove a suffix from the string
    public function removeSuffix($substring)
    {
        $length = strlen($substring);

        if (substr($this->string, -$length) === $substring) {
            return substr($this->string, 0, -$length);
        }

        return $this->string;
    }

    // Method to remove all HTML tags from the string
    public function stripHtmlTags()
    {
        return strip_tags($this->string);
    }

    // Method to replace multiple occurrences of a substring with another string
    public function replaceMultiple($replacements)
    {
        return str_replace(array_keys($replacements), array_values($replacements), $this->string);
    }

    // Method to remove all non-alphanumeric characters from the string
    public function removeNonAlphanumeric()
    {
        return preg_replace('/[^a-zA-Z0-9]+/', '', $this->string);
    }

    // Method to remove diacritics (accent marks) from characters in the string
    public function removeDiacritics()
    {
        return strtr(utf8_decode($this->string), utf8_decode('ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÐðÌÍÎÏìíîïÙÚÛÜùúûüÝýÑñ'), 'AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcDdIIIIiiiiUUUUuuuuYyNn');
    }

    // Method to remove all occurrences of multiple substrings from the string
    public function removeMultiple($substrings)
    {
        return str_replace($substrings, '', $this->string);
    }

    // Method to remove duplicate characters in the string
    public function removeDuplicates()
    {
        return implode('', array_unique($this->split()));
    }

    // Method to remove characters that are not letters (A-Z and a-z) from the string
    public function removeNonLetters()
    {
        return preg_replace('/[^a-zA-Z]+/', '', $this->string);
    }
};