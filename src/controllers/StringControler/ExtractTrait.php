<?
// SubString extraction methods
trait ExtractTrait {

    // Method to split the string into an array of characters
    public function extractChars()
    {
        return preg_split('//u', $this->string, -1, PREG_SPLIT_NO_EMPTY);
    }

    // Method to get the first $n characters of the string
    public function getFirstNChars($n)
    {
        return substr($this->string, 0, $n);
    }

    // Method to return the last $n characters of the string
    public function getLastChars($n)
    {
        $length = strlen($this->string);
        return substr($this->string, -$n, $length);
    }

    // Method to get an array of words in the string
    public function extractWords()
    {
        return preg_split('/\s+/', $this->string);
    }

    // Method to convert the string to an array of lines
    public function extractLines()
    {
        return preg_split("/(\r\n|\n|\r)/", $this->string);
    }

    // Method to convert the string to an array of characters in reverse order
    public function extractWordsReverse()
    {
        return array_reverse($this->extractWords());
    }
    
    // Method to extract a part of the string based on starting position and length
    public function extract($start, $length = null)
    {
        return substr($this->string, $start, $length);
    }

    // Method to get the substring between two other substrings
    public function substringBetween($start, $end)
    {
        $startPos = strpos($this->string, $start);
        $endPos = strpos($this->string, $end, $startPos + strlen($start));
        
        if ($startPos !== false && $endPos !== false) {
            return substr($this->string, $startPos + strlen($start), $endPos - ($startPos + strlen($start)));
        }

        return '';
    }

    // Method to get the substring starting from the nth occurrence of a substring
    public function fromNthOccurrence($substring, $n)
    {
        $pos = $startPos = 0;

        for ($i = 0; $i < $n; $i++) {
            $pos = strpos($this->string, $substring, $startPos);

            if ($pos === false) {
                return '';
            }

            $startPos = $pos + 1;
        }

        return substr($this->string, $pos);
    }

    // Method to get the substring up to the nth occurrence of a substring
    public function untilNthOccurrence($substring, $n)
    {
        $pos = $startPos = 0;

        for ($i = 0; $i < $n; $i++) {
            $pos = strpos($this->string, $substring, $startPos);

            if ($pos === false) {
                return '';
            }

            $startPos = $pos + 1;
        }

        return substr($this->string, 0, $pos);
    }

    // Method to get the substring between the nth and mth occurrences of a substring
    public function betweenNthOccurrences($substring, $n, $m)
    {
        $firstPos = $startPos = 0;

        for ($i = 0; $i < $n; $i++) {
            $firstPos = strpos($this->string, $substring, $startPos);

            if ($firstPos === false) {
                return '';
            }

            $startPos = $firstPos + 1;
        }

        $secondPos = strpos($this->string, $substring, $firstPos + 1);

        for ($i = 1; $i < $m - $n; $i++) {
            $secondPos = strpos($this->string, $substring, $secondPos + 1);

            if ($secondPos === false) {
                return '';
            }
        }

        return substr($this->string, $firstPos + strlen($substring), $secondPos - ($firstPos + strlen($substring)));
    }

    // Method to get the substring after the last occurrence of a substring
    public function afterLast($substring)
    {
        $pos = strrpos($this->string, $substring);
        return $pos !== false ? substr($this->string, $pos + strlen($substring)) : '';
    }

    // Method to get the substring before the last occurrence of a substring
    public function beforeLast($substring)
    {
        $pos = strrpos($this->string, $substring);
        return $pos !== false ? substr($this->string, 0, $pos) : '';
    }

    // Method to extract URLs from the string
    public function extractUrls()
    {
        $pattern = '/\b(?:https?:\/\/|www\.)\S+\b/i';
        preg_match_all($pattern, $this->string, $matches);

        if (isset($matches[0]) && is_array($matches[0])) {
            return $matches[0];
        }

        return [];
    }

    public function extractEmails()
    {
        $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
        preg_match_all($pattern, $this->string, $matches, PREG_SET_ORDER);

        $emails = array_map(function ($match) {
            return $match[0];
        }, $matches);

        return $emails;
    }

    public function extractPhoneNumbers()
    {
        $pattern = '/(?:\+?\d{1,3}\s?)?(?:\(\d{1,4}\)|\d{1,4})[\s-]?\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,8}/';
        preg_match_all($pattern, $this->string, $matches);

        if (isset($matches[0]) && is_array($matches[0])) {
            return $matches[0];
        }

        return [];
    }

    // Method to extract IPv4 addresses from the string
    public function extractIPv4()
    {
        // Use regular expression to find all IPv4 addresses in the string
        preg_match_all('/\b(?:\d{1,3}\.){3}\d{1,3}\b/', $this->string, $matches);

        // Return the array of extracted IPv4 addresses
        return $matches[0];
    }

    // Method to extract IPv6 addresses from the string
    public function extractIPv6Addresses()
    {
        $ipv6Addresses = array();

        // Use preg_match_all() to find all occurrences of IPv6 addresses in the string
        preg_match_all('/(?:[0-9a-fA-F]{1,4}:){7}[0-9a-fA-F]{1,4}|(?:[0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|(?:[0-9a-fA-F]{1,4}:){1,5}(?::[0-9a-fA-F]{1,4}){1}|(?:[0-9a-fA-F]{1,4}:){1,4}(?::[0-9a-fA-F]{1,4}){2}|(?:[0-9a-fA-F]{1,4}:){1,3}(?::[0-9a-fA-F]{1,4}){3}|(?:[0-9a-fA-F]{1,4}:){1,2}(?::[0-9a-fA-F]{1,4}){4}|[0-9a-fA-F]{1,4}(?::[0-9a-fA-F]{1,4}){5}|:(?::[0-9a-fA-F]{1,4}){1,5}|::(?:[0-9a-fA-F]{1,4}:){1,5}|[0-9a-fA-F]{1,4}(?::[0-9a-fA-F]{1,4}){0,5}|:(?::[0-9a-fA-F]{1,4}){1,5}|::)/', $this->string, $matches);

        // Extract the matches from the preg_match_all() result
        if (isset($matches[0])) {
            $ipv6Addresses = $matches[0];
        }

        return $ipv6Addresses;
    }
 
    // Method to get the ASCII value of the first character in the string
     public function ord()
     {
         return ord($this->string);
     }

    // Method to return the longest common prefix between the string and $otherStr
    public function longestCommonPrefix($otherStr)
    {
        $length = min(strlen($this->string), strlen($otherStr));
        $prefix = '';

        for ($i = 0; $i < $length; $i++) {
            if ($this->string[$i] !== $otherStr[$i]) {
                break;
            }
            $prefix .= $this->string[$i];
        }

        return $prefix;
    }

    // Method to Returns the longest common suffix between the string and $otherStr
    public function longestCommonSuffix($otherStr)
    {
        $length = min(strlen($this->string), strlen($otherStr));
        $suffix = '';

        for ($i = 1; $i <= $length; $i++) {
            $suffix = substr($this->string, -$i);

            if (substr($otherStr, -$i) !== $suffix) {
                // The common suffix ends at the previous iteration
                $suffix = substr($this->string, -($i - 1));
                break;
            }
        }

        return $suffix;
    }

    // Method to find the longest common substring between two strings
    public function longestCommonSubstring($otherStr)
    {
        $str1 = $this->string;
        $str2 = $otherStr;

        $length1 = strlen($str1);
        $length2 = strlen($str2);

        // Initialize a 2D array to store the lengths of common substrings
        $commonLengths = array_fill(0, $length1 + 1, array_fill(0, $length2 + 1, 0));

        $longestLength = 0; // Length of the longest common substring
        $endIndex = 0; // End index of the longest common substring in str1

        // Compute the lengths of common substrings
        for ($i = 0; $i <= $length1; $i++) {
            for ($j = 0; $j <= $length2; $j++) {
                if ($i === 0 || $j === 0) {
                    $commonLengths[$i][$j] = 0;
                } elseif ($str1[$i - 1] === $str2[$j - 1]) {
                    $commonLengths[$i][$j] = $commonLengths[$i - 1][$j - 1] + 1;
                    if ($commonLengths[$i][$j] > $longestLength) {
                        $longestLength = $commonLengths[$i][$j];
                        $endIndex = $i - 1;
                    }
                } else {
                    $commonLengths[$i][$j] = 0;
                }
            }
        }

        // Extract the longest common substring
        $longestCommonSubstring = substr($str1, $endIndex - $longestLength + 1, $longestLength);

        return $longestCommonSubstring;
    }



     


}