<?
// String count methods
trait CountTrait{

    // Method to get the length of the string
    public function length()
    {
        return strlen($this->string);
    }
    
    // Method to count the number of characters in the string
    public function countCharacters()
    {
        return strlen($this->string);
    }
    
    // Method to count the words in the string
    public function countWords()
    {
        // Use str_word_count() to count the words in the string
        return str_word_count($this->string);
    }

    // Method to count the lines in the string
    public function countLines()
    {
        // Use preg_split() to split the string into an array of lines
        $lines = preg_split("/(\r\n|\n|\r)/", $this->string);
        
        // Count the number of lines in the array
        return count($lines);
    }

    public function countWhitespaces()
    {
        // Use preg_match_all() to count the whitespaces in the string
        preg_match_all('/\s/', $this->string, $matches);
        return count($matches[0]);
    }

    // Method to count the occurrences of a substring in the string
    public function countOccurrences($substring)
    {
        return substr_count($this->string, $substring);
    }

}