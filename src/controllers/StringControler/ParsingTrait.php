<?
// String parse methods.

trait ParsingTrait {
    // Method to convert the string to a hash using a specific algorithm
    public function hash($algorithm = 'sha256')
    {
        return hash($algorithm, $this->string);
    }
    
    // Method to convert the string to a JSON representation
    public function toJson()
    {
        return json_encode($this->string);
    }

    // Method to convert the string to a human-readable file size
    public function toHumanFileSize()
    {
        $bytes = strlen($this->string);
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = floor(log($bytes, 1024));
        return round($bytes / pow(1024, $index), 2) . ' ' . $units[$index];
    }

    // Method to convert the string to a Roman numeral representation (if it's an integer)
    public function toRoman()
    {
        $numeralMap = [
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];

        $number = intval($this->string);
        $roman = '';

        foreach ($numeralMap as $numeral => $value) {
            while ($number >= $value) {
                $roman .= $numeral;
                $number -= $value;
            }
        }

        return $roman;
    }
    // Me
    public function romanToNumber()
    {
        $romanNumerals = [
            'I' => 1, 'IV' => 4, 'V' => 5, 'IX' => 9, 'X' => 10,
            'XL' => 40, 'L' => 50, 'XC' => 90, 'C' => 100,
            'CD' => 400, 'D' => 500, 'CM' => 900, 'M' => 1000
        ];

        $result = 0;
        $str = strtoupper($this->string);

        foreach ($romanNumerals as $roman => $value) {
            while (strpos($str, $roman) === 0) {
                $result += $value;
                $str = substr($str, strlen($roman));
            }
        }

        return $result;
    }

    public function toBinary()
    {
        $binary = '';
        for ($i = 0; $i < strlen($this->string); $i++) {
            $binary .= sprintf('%08b', ord($this->string[$i]));
        }
        return $binary;
    }

    // Method to convert the string to a hexadecimal representation
    public function toHex()
    {
        $hex = '';
        for ($i = 0; $i < strlen($this->string); $i++) {
            $hex .= sprintf('%02x', ord($this->string[$i]));
        }
        return $hex;
    }

    // convert numbers to words
    public function numbersToWords($number = 0, $lang = 'en'){
        $decimalsConjunctionArray = array(
            'en' => 'and',
            'fr' => 'et',
            'es' => 'y',
            'it' => 'e',
            'de' => 'und',
            'pt' => 'e',
            'ru' => 'и',
            'nl' => 'en',
            'pl' => 'i',
            'ua' => 'i'
        );
        if (version_compare(PHP_VERSION, '5.3.0', '<') || !class_exists('NumberFormatter')) {
            exit('You need PHP 5.3 or above, and php_intl extension');
        }

        $formatter = new \NumberFormatter($lang, \NumberFormatter::SPELLOUT);
        list($integerPart, $decimalPart) = explode('.', number_format($number, 2, '.', ''));

        $integerPartInWords = $formatter->format($integerPart);
        $decimalPartInWords = $formatter->format($decimalPart);

        return $integerPartInWords . ' '.$decimalsConjunctionArray[$lang].' ' . $decimalPartInWords;
    }
    
}