<?
// SString manipulation methods
trait ManipulationTraits {

    // Method to ensure the string begins with $substring
    public function ensureStartsWith($substring)
    {
        if (strpos($this->string, $substring) === 0) {
            return $this->string; // The string already starts with $substring
        }

        return $substring . $this->string;
    }

    // Method to ensure the string ends with $substring
    public function ensureEndsWith($substring)
    {
        // Check if the string already ends with the $substring
        if (substr($this->string, -strlen($substring)) !== $substring) {
            // If not, append $substring to the end of the string
            $this->string .= $substring;
        }

        return $this->string;
    }

    // Method to return a new string starting with $string
    public function prepend($string)
    {
        return $string . $this->string;
    }

    // Method to append a string to the current string
    public function append($stringToAppend)
    {
        // Concatenate the given string to the current string
        $this->string .= $stringToAppend;
        return $this->string;
    }

    // Method to insert $substring into the string at the $index provided
    public function insertAt($substring, $index)
    {
        // Check if $index is within the bounds of the string
        if ($index >= 0 && $index <= strlen($this->string)) {
            // Use substr_replace() to insert the $substring at $index
            $start = substr($this->string, 0, $index);
            $end = substr($this->string, $index);
            $this->string = $start . $substring . $end;
        }
    }

    // Method to reverse the characters in the string
    public function reverse()
    {
        return strrev($this->string);
    }

    // Method to shuffle the characters in the string
    public function shuffle()
    {
        $array = $this->split();
        shuffle($array);
        return implode('', $array);
    }

    // Method to surround the string with the given substring
    public function surroundWith($substring)
    {
        return $substring . $this->string . $substring;
    }

    // Method to remove whitespace from the string
    public function removeWhitespace()
    {
        // Use preg_replace() to remove all whitespace characters (\s) from the string
        return preg_replace('/\s+/', '', $this->string);
    }

    // Method to repeat the string a certain number of times
    public function repeat($multiplier)
    {
        return str_repeat($this->string, $multiplier);
    }

    // Method to pad the string with a specific character to a certain length
    public function pad($length, $padChar = ' ', $padType = STR_PAD_RIGHT)
    {
        return str_pad($this->string, $length, $padChar, $padType);
    }

    // Method to convert the string to a slug (lowercase, hyphen-separated words)
    public function toSlug()
    {
        return preg_replace('/[^a-z0-9]+/', '-', strtolower($this->string));
    }

    // Method to convert the string to a slug with a custom separator
    public function toSlugWithSeparator($separator)
    {
        return preg_replace('/[^a-z0-9]+/', $separator, strtolower($this->string));
    }

    // Method to reverse the words in the string
    public function reverseWords()
    {
        $words = preg_split('/\s+/', $this->string);
        return implode(' ', array_reverse($words));
    }

    // Method to truncate the string to a specified length
    public function truncate($length, $ellipsis = '...')
    {
        if (strlen($this->string) <= $length) {
            return $this->string;
        }

        return substr($this->string, 0, $length) . $ellipsis;
    }

    // Method to convert the string to a truncated slug
    public function toTruncatedSlug($maxLength = 50, $separator = '-')
    {
        $slug = preg_replace('/[^a-z0-9]+/', $separator, strtolower($this->string));
        return $this->truncate($maxLength, $separator . $slug);
    }

    // Method to convert the string to a numbered list (array of lines)
    public function toNumberedList()
    {
        $lines = preg_split("/(\r\n|\n|\r)/", $this->string);
        foreach ($lines as $key => $line) {
            $lines[$key] = ($key + 1) . '. ' . $line;
        }
        return $lines;
    }

    // Method to encode the string using HTML entities
    public function htmlEncode()
    {
        return htmlentities($this->string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    // Method to pad the string to a specific length with spaces centered around it
    public function center($length)
    {
        $padding = $length - strlen($this->string);
        $leftPadding = floor($padding / 2);
        $rightPadding = $padding - $leftPadding;
        return str_repeat(' ', $leftPadding) . $this->string . str_repeat(' ', $rightPadding);
    }

    // Method to return a lowercase and trimmed string separated by dashes
    public function toLowercaseTrimmedWithDashes()
    {
        // Remove underscores and spaces and convert the string to lowercase
        $cleanedString = str_replace(['_', ' '], '', strtolower($this->string));

        // Insert dashes before uppercase characters (except for the first character)
        $withDashes = preg_replace('/(?<!^)([A-Z])/', '-$1', $cleanedString);

        return $withDashes;
    }

    // Method to Returns a lowercase and trimmed string separated by the given delimiter
    public function formattedLowercaseString($delimiter = '-')
    {
        $words = preg_split('/[\s_-]+/', $this->string);
        $result = '';

        foreach ($words as $index => $word) {
            $isFirstWord = ($index === 0);
            $isAlphaDelimiter = (ctype_alpha($delimiter) && ctype_alpha($word));

            if (!$isFirstWord) {
                $result .= $delimiter;
            }

            $result .= $isAlphaDelimiter ? $word : strtolower($word);
        }

        return $result;
    }

    // Method to replace Windows-1252 characters with their ASCII equivalents
    public function replaceWindows1252Chars()
    {
        $windows1252Chars = [
            "\x82" => "'",  // Single low-9 quotation mark
            "\x84" => '"',  // Double low-9 quotation mark
            "\x85" => '...', // Ellipsis
            "\x91" => "'",  // Left single quotation mark
            "\x92" => "'",  // Right single quotation mark
            "\x93" => '"',  // Left double quotation mark
            "\x94" => '"',  // Right double quotation mark
            "\x96" => '-',  // En dash
            "\x97" => '--', // Em dash
            "\x99" => '™',  // Trade mark symbol
        ];

        return strtr($this->string, $windows1252Chars);
    }

    // Method to convert spaces to tabs
    public function convertSpacesToTabs($tabLength = 4)
    {
        // Use preg_replace() with a regular expression to find consecutive spaces and replace them with a tab
        return preg_replace('/ {' . $tabLength . '}/', "\t", $this->string);
    }




}
