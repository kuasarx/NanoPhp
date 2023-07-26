
# Strings Controler `Str()`

The `Str()` class is a utility class designed to facilitate various string manipulation tasks within a PHP application. It offers a wide range of methods that enable to perform common string operations easily and efficiently.




## Features
- Convert the string to uppercase or lowercase.
- Check if the string is empty or contains specific substrings.
- Count the occurrences of substrings, characters, words, and lines in the string.
- Extract substrings based on their occurrence positions.
- Remove whitespace, HTML tags, and diacritics (accent marks) from the string.
- Convert the string to various representations, such as binary, hexadecimal, and JSON.
- Manipulate string cases, including camelCase, title case, and snake_case.
- Convert the string to URL-safe slugs with customizable separators.
- Pad the string, truncate, and replace substrings with ease.
- Perform checks for valid email addresses, URLs, IPv4, and IPv6 addresses, as well as UUIDs.
- Generate human-readable file sizes, ASCII arrays, and Roman numerals from integers.

---

## Structure

- 📄 StringController.php
- 📁StringController
    - 📄 CaseTrait.php _(Case related methods)_
    - 📄 CheckersTrait.php _(String comprobation methods)_
    - 📄 CountTrait.php _(Counting related methods)_
    - 📄 ExtractTrait.php _(string extraction related methods)_
    - 📄 ManipulationTrait.php _(String manipultion related methods)_
    - 📄 ReplaceTrait.php _(String replacements related methods)_
    - 📄 ParsingTrait.php _(String parsing related methods)_


## Usage/Examples

1. Instantiate the Str class with the desired string as its constructor argument.
2. Call various methods to perform string manipulation tasks as needed.
3. Retrieve the results of the operations as returned by the methods.

```php
$string = new Str("Hello, World!");

echo $string->toLowerCase();         // Output: "hello, world!"
echo $string->length();              // Output: 13
echo $string->contains('World');     // Output: true
echo $string->countWords();          // Output: 2
echo $string->toSlug();              // Output: "hello-world"

```

## Available Methods 
### Case
- [toLowerCase](#tolowercase)
- [toUpperCase](#touppercase)
- [toCamelCase](#tocamelcase)
- [toUpperCamelCase](#touppercamelcase)
- [toValidVariableName](#tovalidvariablename)
- [toValidClassName](#tovalidclassname)
- [titleCase](#titlecase)
- [swapCase](#swapcase)
### Checkers
- [contains](#contains)
- [containsAny](#containsany)
- [containsOnlyHexChars](#containsonlyhexchars)
- [containsLowerCaseChar](#containslowercasechar)
- [containsUpperCaseChar](#containsuppercasechar)
- [endsWith](#endswith)
- [endsWithAny](#endswithany)
- [isEmpty](#isempty)
- [isAlpha](#isalpha)
- [isAlphanumeric](#isalphanumeric)
- [isNumeric](#isnumeric)
- [isBase64](#isbase64)
- [isWhitespace](#iswhitespace)
- [isEmail](#isemail)
- [isUrl](#isurl)
- [isPalindrome](#ispalindrome)
- [isIPv4](#isipv4)
- [isIPv6](#isipv6)
- [isJson](#isjson)
- [isUuid](#isuuid)
- [isSerialized](#isserialized)
- [matchesRegex](#matchesregex)
- [isUpperCase](#isuppercase)
- [startsWith](#startswith)
- [startsWithAny](#startswithany)
- [isLowerCase](#islowercase)
- [getEncoding](#getencoding)

### Replace

- [replace](#replace)
- [replaceMultiple](#replacemultiple)
- [remove](#remove)
- [removeAll](#removeall)
- [removePrefix](#removeprefix)
- [removeSuffix](#removesuffix)
- [removeNonAlphanumeric](#removenonalphanumeric)
- [removeDiacritics](#removediacritics)
- [removeMultiple](#removemultiple)
- [removeDuplicates](#removeduplicates)
- [removeNonLetters](#removenonletters)
- [trim](#trim)
- [trimLeft](#trimleft)
- [trimRight](#trimright)
- [stripHtmlTags](#striphtmltags)

### Extract
- [extractChars](#extractchars)
- [getFirstNChars](#getfirstnchars)
- [getLastChars](#getlastchars)
- [extract](#extract)
- [extractWords](#extractwords)
- [extractLines](#extractlines)
- [extractWordsReverse](#extractwordsreverse)
- [extractUrls](#extracturls)
- [extractEmails](#extractemails)
- [extractPhoneNumbers](#extractphoneNumbers)
- [extractIPv4](#extractipv4)
- [extractIPv6Addresses](#extractipv6addresses)
- [firstOccurrence](#firstoccurrence)
- [lastOccurrence](#lastoccurrence)
- [substringBetween](#substringbetween)
- [fromNthOccurrence](#fromnthoccurrence)
- [untilNthOccurrence](#untilnthoccurrence)
- [betweenNthOccurrences](#betweennthoccurrences)
- [afterLast](#afterlast)
- [beforeLast](#beforelast)
- [ord](#ord)
- [longestCommonPrefix](#longestcommonprefix)
- [longestCommonSuffix](#longestcommonsuffix)
- [longestCommonSubstring](#longestcommonsubstring)

### Count
- [length](#length)
- [countCharacters](#countcharacters)
- [countWords](#countwords)
- [countLines](#countlines)
- [countWhitespaces](#countwhitespaces)
- [countOccurrences](#countoccurrences)

### Parsing
- [hash](#hash)
- [toJson](#tojson)
- [toHumanFileSize](#tohumanfileSize)
- [toRoman](#toroman)
- [romanToNumber](#romantonumber)
- [toBinary](#tobinary)
- [toHex](#tohex)
- [numbersToWords](#numberstowords)
### Check Performing

### `getEncoding`

The `getEncoding()` method is a convenient utility provided by the `Str` class to determine the encoding used by the input string. It employs the `mb_detect_encoding()` function, which is part of the multibyte string extension in PHP, to automatically detect the encoding of the string.

**Parameters:**
This method does not take any parameters as it operates solely on the string contained within the `Str` object.

```php
// Instantiate the Str class with a UTF-8 encoded string
$string = new Str("Hello, World! - こんにちは、世界！");

// Get the encoding used by the string
$encoding = $string->getEncoding();
echo $encoding; // Output: "UTF-8"
```
**Note:** It is important to ensure that the multibyte string extension (`mbstring`) is enabled in your PHP installation to utilize this method effectively. The `getEncoding()` method aids in identifying the character encoding, which can be valuable when handling multilingual content or working with strings originating from different sources.

### `startsWith`

The `startsWith($substring)` method is used to determine whether the given string starts with the specified substring. It compares the beginning of the string with the provided substring and returns `true` if they match, otherwise `false`.

**Parameters:**
- `$substring` (string): The substring to check if it appears at the beginning of the main string.

```php
$string = new Str("Hello, World!");

echo $string->startsWith("Hello");  // Output: true
echo $string->startsWith("World");  // Output: false
echo $string->startsWith("H");      // Output: true
echo $string->startsWith("Hello,"); // Output: true
echo $string->startsWith("hello");  // Output: false (case-sensitive)
```
**Note:** The `startsWith()` method is case-sensitive, meaning it will consider the character case while performing the comparison. If the substring is found at the beginning of the string, it returns `true`, otherwise `false`.

### `startsWithAny`

This method checks whether the given string starts with any of the provided substrings. It takes an array or a single string as its parameter.

**Parameters:**
- `$substrings` (array): An array or a single string representing the substrings to be checked against the beginning of the original string.

**Return Value:**
- `true`: If the string starts with any of the provided substrings.
- `false`: If the string does not start with any of the provided substrings.

```php
$string = new Str("Hello, World!");

$startsWithHello = $string->startsWithAny(["Hi", "Hello", "Hey"]); // Output: true
$startsWithHey = $string->startsWithAny("Hey"); // Output: false
```
In this example, the method `startsWithAny()` is used to check if the string starts with any of the provided substrings. The first call with the array `["Hi", "Hello", "Hey"]` returns `true` since the string starts with "Hello." The second call with the string `"Hey"` returns `false` as the string does not start with "Hey."

### `endsWith`

This method checks whether the given string ends with the specified substring. It returns a boolean value indicating whether the condition is met.

**Parameters:**
- `$substring` (string): The substring to be checked against the end of the original string.

**Return Value:**
- `true`: If the string ends with the provided substring.
- `false`: If the string does not ends with the provided substring.

```php
$string = new Str("Hello, World!");

$string->endsWith('World');    // Returns: true
$string->endsWith('hello');    // Returns: false
```
In this example, the method `endsWith()`  is used to check if the string "Hello, World!" ends with the substring "World." The method returns `true` since the condition is satisfied. Conversely, checking for the substring "hello" returns `false`, as it does not match the end of the original string.

### `endsWithAny`

This method is used to determine whether the current string ends with any of the specified substrings provided in an array.

**Parameters:**
- `$substrings` (array): An array of substrings to check for the ending of the string.

**Return Value:**
- `true`: If the string ends with any of the provided substrings.
- `false`: If the string does not ends with any of the provided substrings.

```php
$string = new Str("Hello, World!");

// Check if the string ends with any of the given substrings
$endsWithAny = $string->endsWithAny(['World!', 'John', 'Alice']);

echo $endsWithAny ? 'Yes' : 'No'; // Output: "Yes"
```
In this example, the method `endsWithAny ()`   is used to check if the string ends with any of the substrings 'World!', 'John', or 'Alice'. Since the string ends with 'World!', the method returns `true`, and the output is "Yes." If none of the substrings were found at the end of the string, the method would return `false`, resulting in an output of "No."

### `isEmpty`

This method is used to determine whether the current string ends with any of the specified substrings provided in an array.

**Parameters:**
- none

**Return Value:**
- `true`: if the string is empty or contains only whitespace characters.
- `false`: if the string has one or more non-whitespace characters.

```php
$string = new Str("");

if ($string->isEmpty()) {
    echo "The string is empty or contains only whitespace characters.";
} else {
    echo "The string is not empty and contains non-whitespace characters.";
}
```
In the above example, if the string passed to the `Str` class constructor is empty or contains only whitespace characters (e.g., spaces or tabs), the `isEmpty()` method will return `true`, and the message "The string is empty or contains only whitespace characters." will be displayed. Otherwise, if the string contains at least one non-whitespace character, the method will return `false`, and the message "The string is not empty and contains non-whitespace characters." will be displayed.

### `contains` 

This method is used to determine whether the given string contains a specific substring. It returns a boolean value, true if the substring is found, and false otherwise.

**Parameters:**
- `$substring` (string): The substring to search for within the original string.

**Return Value:**
- `true`: if the substring is found.
- `false`: if the substring is not found.

```php
$string = new Str("");

// Check if the string contains the substring "Hello"
if ($string->contains("Hello")) {
    echo "Substring found!";
} else {
    echo "Substring not found!";
}

// Output: "Substring found!"
```
In this example, the method checks whether the string "Hello, World!" contains the substring "Hello." As the substring is present in the original string, it outputs "Substring found!". If the substring were not present, it would output "Substring not found!". This method is useful for quickly verifying the existence of specific substrings within strings and enables to take appropriate actions based on the results.

### `containsAny`

This method is used to check if the string contains any of the specified substrings from an array. It takes an array of substrings as its parameter and returns a boolean value indicating whether any of the substrings are found in the string.

**Parameters:**
- `$substrings` (array): An array containing the substrings to search for in the string.

**Return Value:**
- `true`: if the string contains at least one of the specified substrings.
- `false`: if the string does not contain any of the specified substrings.

```php
$string = new Str("");

$substrings = ['Hello', 'Foo', 'World'];
if ($string->containsAny($substrings)) {
    echo "The string contains at least one of the specified substrings.";
} else {
    echo "The string does not contain any of the specified substrings.";
}
```
In this example, the method is used to check if the string contains any of the substrings "Hello", "Foo", or "World". If at least one of these substrings is found in the string, the first part of the conditional statement will be executed, indicating that the string contains one of the specified substrings. Otherwise, it will execute the else part, indicating that none of the substrings are present in the string.

### `isAlpha`

This method is used to determine whether a given string contains only alphabetic characters (A-Z or a-z). It returns a boolean value indicating whether the string consists solely of letters.

**Parameters:**
- none.

**Return Value:**
- `true`: if the string contains only alphabetic characters (A-Z or a-z).
- `false`: if the string contains any other characters.

```php
$string = new Str("Hello");
$isAlpha = $string->isAlpha(); // Output: true

$string2 = new Str("Hello, World!");
$isAlpha2 = $string->isAlpha(); // Output: false
```
In the first example, the `isAlpha` method is called on the string "Hello," which contains only alphabetical characters, resulting in `true`. In the second example, the method is called on the string "Hello, World!", which includes a comma and space, leading to `false`.

### `isAlphanumeric`

This method is used to determine whether the provided string contains only alphanumeric characters. An alphanumeric character is defined as any letter (A-Z or a-z) or digit (0-9).

**Parameters:**
- none.

**Return Value:**
- `true`:  if the entire string consists of only alphanumeric characters.
- `false`: if the string contains any non-alphanumeric characters.

```php
$string = new Str("Hello123");
$isAlpha = $string->isAlphanumeric(); // Output: true

$string2 = new Str("Hello, World!");
$isAlpha2 = $string->isAlphanumeric(); // Output: false
```
**Note:** This method is useful for validating input strings that are expected to contain only letters and digits. It can be utilized in various scenarios, such as user input validation, generating slugs, or ensuring data integrity.

### `isNumeric`

This method  is used to determine if a given string consists of only numeric digits. It returns a boolean value indicating whether the entire string contains numeric characters or not.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the entire string consists of only numeric characters.
- `false`: if the string contains any non-numeric characters.

```php
$string = new Str("12345");
$isNumeric = $string->isNumeric(); // Output: true

$string2 = new Str("Hello123");
$isNumeric2 = $string->isNumeric(); // Output: false
```
In the above example, the `isNumeric()` method is applied to two different strings. The first string, "12345", contains only numeric digits, so the method returns `true`. On the other hand, the second string, "Hello123", contains a mix of alphabetic and numeric characters, causing the method to return `false`.


### `isBase64`

This method is used to determine whether a given string is encoded in Base64 format. It returns a boolean value indicating whether the input string is a valid Base64-encoded string or not.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is Base64 encoded.
- `false`: if the string is not Base64 encoded.

```php
$string = new Str("SGVsbG8sIFdvcmxkIQ==");

if ($string->isBase64()) {
    echo "The string is Base64 encoded.";
} else {
    echo "The string is not Base64 encoded.";
}

// Output: The string is Base64 encoded.
```
In this example, the `isBase64()` method is used to check if the provided string is Base64 encoded. Since the input string "SGVsbG8sIFdvcmxkIQ==" is indeed Base64 encoded, the method returns `true`, and the message "The string is Base64 encoded." is displayed. If the input string were not Base64 encoded, the method would return `false`, and the message "The string is not Base64 encoded." would be displayed.


### `containsOnlyHexChars`

This method is a convenient function within the `Str` class that enables to determine if a given string exclusively contains hexadecimal characters. It returns a boolean value (`true` or `false`) indicating whether the string is composed solely of characters in the hexadecimal format.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string contains exclusively hexadecimal characters.
- `false`: if the string not contains exclusively hexadecimal characters.

```php
$string = new Str("1a2b3c4d5e6f");
$result1 = $string->containsOnlyHexChars();  // Output: true

$string = new Str("Hello, World!");
$result2 = $string->containsOnlyHexChars();  // Output: false
```
In the first example, the string "1a2b3c4d5e6f" contains only valid hexadecimal characters (0-9 and a-f), resulting in `true`. Conversely, in the second example, the string "Hello, World!" contains non-hexadecimal characters (letters and punctuation), leading to `false`. This method proves helpful when verifying whether a string is suitable for operations that require hexadecimal input.


### `isWhitespace`

This method is a utility function provided by the `Str` class, designed to determine if a given string consists entirely of whitespace characters. It returns a boolean value indicating whether the string contains only spaces, tabs, or newlines and no other visible characters.

**Parameters:**
- none.

```php
$string1 = new Str("   "); // Contains only spaces
$string2 = new Str("\t"); // Contains a tab
$string3 = new Str("\n"); // Contains a newline
$string4 = new Str(" Hello, World! "); // Contains visible characters

echo $string1->isWhitespace(); // Output: true
echo $string2->isWhitespace(); // Output: true
echo $string3->isWhitespace(); // Output: true
echo $string4->isWhitespace(); // Output: false
```
**Note:** The `isWhitespace()` method can be useful for validating user input, performing text processing tasks, or checking the content of strings before further manipulation within a PHP application. It complements the other string manipulation methods provided by the `Str` class, making it a versatile utility for handling strings in a PHP project.

### `isEmail`

The `isEmail()` method is used to check whether the provided string is a valid email address. It utilizes PHP's built-in FILTER_VALIDATE_EMAIL filter to validate the email format.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is a valid email address.
- `false`: if the string is not a valid email address or is empty.

```php
$string = new Str("example@example.com");
if ($string->isEmail()) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}
// Output: Valid email address.
```
In this example, we create an instance of the Str class with the string `"example@example.com"`. The `isEmail()` method is then called on this instance to validate the string as a valid email address. Since the string follows the correct email format, the method returns `true`, and the corresponding message is displayed.


### `isUrl`

The `isUrl()` method is used to determine whether the given string is a valid URL. It utilizes PHP's built-in `filter_var()` function along with the `FILTER_VALIDATE_URL` filter to perform the validation. The method returns a boolean value (`true` if the string is a valid URL and `false` otherwise).

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is a valid URL.
- `false`: if the string is not a valid URL or is empty.

```php
// Create a Str instance with a string containing a URL
$urlString = new Str("https://www.example.com");

// Check if the string is a valid URL
if ($urlString->isUrl()) {
    echo "Valid URL!";
} else {
    echo "Invalid URL!";
}
```
In the example above, the `isUrl()` method is called on a Str instance containing the URL `"https://www.example.com"`. Since the URL is valid, the output will be "Valid URL!".

### `matchesRegex`

The `matchesRegex($pattern)` method allows you to check if a given string matches a specified regular expression pattern. It utilizes PHP's `preg_match` function to perform the matching operation. The method returns `true` if the regular expression pattern is found within the string and `false` otherwise.

**Parameters:**
- `$pattern` (string): The regular expression pattern to be matched against the string.


```php
$string = new Str("Hello, World!");

// Check if the string contains any digits
if ($string->matchesRegex('/\d+/')) {
    echo "The string contains at least one digit.";
} else {
    echo "No digits found in the string.";
}
```
In this example, the `matchesRegex()` method is used to determine whether the string contains any digits. The regular expression pattern ` /\d+/ ` matches one or more digits. If the string contains at least one digit, the method will return `true`, and the corresponding message will be displayed. Otherwise, it will return `false`, and the alternative message will be shown.


### `isPalindrome`

The `isPalindrome ()` method checks whether the given string is a palindrome, meaning it reads the same backward as forward. The method ignores letter case during comparison, making it case-insensitive.

**Parameters:**
- none.


```php
$string = new Str("radar");
echo $string->isPalindrome();   // Output: true

$string2 = new Str("Hello");
echo $string2->isPalindrome();  // Output: false
```
In the first example, the word "radar" is a palindrome, so the method returns `true`. In the second example, the word "Hello" is not a palindrome, so the method returns `false`.


### `isIPv4`

The `isIPv4()` method checks whether the provided string is a valid IPv4 address.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is a valid IPv4 address.
- `false`: if the string is not a valid IPv4 address or does not resemble an IPv4 format.

```php
$string = new Str("192.168.1.1");

if ($string->isIPv4()) {
    echo "Valid IPv4 address!";
} else {
    echo "Not a valid IPv4 address!";
}

// Output: Valid IPv4 address!
```
In this example, the `isIPv4()` method is called on a Str instance with the string `"192.168.1.1"`. Since this string represents a valid IPv4 address, the method returns `true`, and the output confirms that the input is a valid IPv4 address.

### `isIPv6`

The `isIPv6()` method checks whether the provided string is a valid IPv6 address.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is a valid IPv6 address.
- `false`: if the string is not a valid IPv6 address or does not resemble an IPv6 format.

```php
// Usage example:
$string1 = new Str("2001:0db8:85a3:0000:0000:8a2e:0370:7334");
$string2 = new Str("::1");
$string3 = new Str("123.456.789.123"); // Not a valid IPv6 address

var_dump($string1->isIPv6()); // Output: bool(true)
var_dump($string2->isIPv6()); // Output: bool(true)
var_dump($string3->isIPv6()); // Output: bool(false)
```
In this example, we create three instances of the `Str` class, each containing a different string. We use the `isIPv6()` method to check if the strings represent valid IPv6 addresses. The method returns `true` for valid IPv6 addresses and `false` otherwise.

### `isJson`

The `isJson ()` method is designed to validate whether a given string represents a valid JSON format. It checks if the string can be successfully decoded into a PHP value using the `json_decode` function, and then verifies if there were any parsing errors.

**Parameters:**
- none.

**Return Value:**
- Returns a boolean value (`true` or `false`) indicating whether the string is in valid JSON format.

```php
$string = new Str('{"name": "John", "age": 30, "city": "New York"}');

if ($string->isJson()) {
    echo 'Valid JSON format!';
} else {
    echo 'Invalid JSON format!';
}
```
In the example above, the `isJson` method is used to check if the string `{"name": "John", "age": 30, "city": "New York"}` is a valid JSON format. Since the string represents a well-formed JSON object, the method will return `true`, and the output will be "Valid JSON format!".

**Note:** This method can be useful when dealing with JSON data in a PHP application, helping to validate and handle JSON inputs from various sources, such as API responses or user inputs.

### `isUuid`

The `isUuid()` method allows you to check whether the given string is a valid UUID (Universal Unique Identifier). A UUID is a 128-bit unique identifier represented as a 36-character string, typically consisting of hexadecimal characters and hyphens in a specific pattern.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string is a valid UUID.
- `false`: if the string is not a valid UUID.

```php
$string = new Str("550e8400-e29b-41d4-a716-446655440000");
echo $string->isUuid(); // Output: true

$string = new Str("ThisIsNotAValidUuid");
echo $string->isUuid(); // Output: false
```
**Note:** The `isUuid` method uses a regular expression to validate the UUID format. It checks whether the input string matches the standard pattern of a UUID, which includes eight groups of hexadecimal characters separated by hyphens in a specific arrangement. The method is case-insensitive and can detect UUIDs with or without surrounding curly braces.


### `isSerialized`

The `isSerialized()` method allows you to check whether the given string is a serialized PHP data structure. Serialization is the process of converting data into a format that can be easily stored, transmitted, or reconstructed later. PHP provides a built-in function `unserialize()` to reverse the serialization process and restore the original data structure. This method examines whether the input string can be successfully unserialized or if it matches specific serialized representations of false or null.

**Parameters:**
- none.

**Return Value:**
- Returns a boolean value (`true` or `false`) indicating whether the string is serialized.

```php
$string = new Str('a:3:{i:0;s:5:"apple";i:1;s:6:"banana";i:2;s:6:"orange";}');

if ($string->isSerialized()) {
    $data = unserialize($string);
    print_r($data); // Output: Array ( [0] => apple [1] => banana [2] => orange )
} else {
    echo "The given string is not serialized.";
}
```
In this example, the `isSerialized()` method checks the provided string, which is a serialized PHP array, and confirms that it can be successfully unserialized. Subsequently, the serialized array is restored and printed to the screen. If the string is not a valid serialized representation, the method will return false, and a message indicating it not being serialized will be displayed.


### `containsLowerCaseChar`

The `containsLowerCaseChar()` method serves to determine whether the provided string contains at least one lowercase character. It is useful for validating strings that require specific case requirements or implementing logic that depends on the presence of lowercase characters.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string contains at least one lowercase character.
- `false`: if the string does not contain any lowercase characters.

```php
$string = new Str("Hello, World!");

// Check if the string contains a lowercase character
if ($string->containsLowerCaseChar()) {
    echo "The string contains lowercase characters.";
} else {
    echo "The string does not contain any lowercase characters.";
}

// Output: The string contains lowercase characters.
```
**Note:** The `containsLowerCaseChar()` method uses `preg_match()` to perform a regular expression search for lowercase characters in the string. It returns a boolean value indicating the presence or absence of lowercase characters.

### `containsUpperCaseChar`

The `containsUpperCaseChar()` method serves to determine whether the provided string contains at least one uppercase character. It is useful for validating strings that require specific case requirements or implementing logic that depends on the presence of uppercase characters.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string contains at least one uppercase character.
- `false`: if the string does not contain any uppercase characters.

```php
$string = new Str("Hello, World!");
echo $string->containsUpperCaseChar(); // Output: true

$string2 = new Str("hello, world!");
echo $string2->containsUpperCaseChar(); // Output: false

```
**Note:** The `containsUpperCaseChar()` method uses `preg_match()` to perform a regular expression search for uppercase characters in the string. It returns a boolean value indicating the presence or absence of uppercase characters.

### `isUpperCase`

The `isUpperCase()` method is used to determine if the given string consists entirely of uppercase characters. It returns a boolean value indicating whether the string is in uppercase or not.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string consists entirely of uppercase characters.
- `false`: if the string does not consists entirely of uppercase characters.

```php
$string = new Str("HELLO, WORLD!");

if ($string->isUpperCase()) {
    echo "The string is in uppercase.";
} else {
    echo "The string is not in uppercase.";
}
```
**Note:** The `containsUpperCaseChar()` method uses `preg_match()` to perform a regular expression search for uppercase characters in the string. It returns a boolean value indicating the presence or absence of uppercase characters.

### `isLowerCase`

The `isLowerCase()` method is used to determine if the given string consists entirely of lowercase  characters. It returns a boolean value indicating whether the string is in lowercase or not.

**Parameters:**
- none.

**Return Value:**
- `true`:  if the string consists entirely of lowercase characters.
- `false`: if the string does not consists entirely of lowercase characters.

```php
$string = new Str("hello, world!");

if ($string->isLowerCase()) {
    echo "The string is in all lowercase.";
} else {
    echo "The string contains uppercase letters or non-alphabetic characters.";
}

```
**Note:** This method uses `preg_match()` and is useful for verifying whether a string consists solely of lowercase characters, which can be helpful in scenarios such as input validation or formatting requirements within a PHP application.

---
### Case Related Methods

### `toLowerCase`

The `toLowerCase()` method is used to convert the given string to lowercase characters. It returns a new string with all alphabetic characters in lowercase while leaving non-alphabetic characters unchanged.

**Parameters:**
- none.

**Return Value:**
- The original string converted to lowercase.

```php
$string = new Str("Hello, World!");

echo $string->toLowerCase(); // Output: "hello, world!"
```

### `toUpperCase`

The `toUpperCase()` method is used to convert the given string to uppercase characters. It returns a new string with all alphabetic characters in uppercase while leaving non-alphabetic characters unchanged.

**Parameters:**
- none.

**Return Value:**
- The original string converted to uppercase.

```php
$string = new Str("hello, world!");

echo $string->toUpperCase(); // Output: "HELLO, WORLD!"
```

### `titleCase`

The `titleCase()` method is used to convert a given string to title case, where the first letter of each word is capitalized while preserving the rest of the letters in lowercase. This is commonly used to ensure proper capitalization in titles, headings, or sentences.

**Parameters:**
- none.

**Return Value:**
- The first letter of each word to uppercase and the rest to lowercase.

```php
// Instantiate the Str class with the input string
$string = new Str("hello, world! welcome to the string manipulation.");

// Call the titleCase() method
$result = $string->titleCase();

// Output the result
echo $result; // Output: "Hello, World! Welcome To The String Manipulation."
```

### `toCamelCase`

The `toCamelCase()` method is used to convert a given string to a camelCase representation. In camelCase, each word is joined together without spaces, and the first letter of each word (except the first one) is capitalized. It is commonly used for naming variables, functions, and identifiers in programming languages.

**Parameters:**
- none.

**Return Value:**
- string as camelCase representation

```php
$string = new Str("hello_world_from_php");

echo $string->toCamelCase(); // Output: "helloWorldFromPhp"
```

### `toUpperCamelCase`

The `toUpperCamelCase()` method takes a string as input and returns its UpperCamelCase version. UpperCamelCase, also known as PascalCase, capitalizes the first letter of each word and removes any non-alphanumeric characters.

**Parameters:**
- none.

**Return Value:**
- string.

```php
$string = new Str("hello_world_example");
echo $string->toUpperCamelCase(); // Output: "HelloWorldExample"
```

### `toValidVariableName`

The `toValidVariableName()` method is used to convert a given string into a valid variable name in camelCase format. It removes any special characters, spaces, and symbols from the string, and then capitalizes the first letter of each word except the first one. The resulting string can be used as a variable name in PHP code.

**Parameters:**
- none.

**Return Value:**
- string.

```php
$string = new Str("hello world");
echo $string->toValidVariableName(); // Output: "helloWorld"

$string = new Str("user_id");
echo $string->toValidVariableName(); // Output: "userId"

$string = new Str("first_name");
echo $string->toValidVariableName(); // Output: "firstName"
```

### `toValidClassName`

The `toValidClassName()` method is used to convert a given string into a valid class name following the **PascalCase naming convention**. It ensures that the resulting class name contains only alphanumeric characters and starts with an uppercase letter, adhering to PHP class naming rules.

**Parameters:**
- none.

**Return Value:**
- string.

```php
$string = new Str("hello_world_example");
$className = $string->toValidClassName();

echo $className; // Output: "HelloWorldExample"
```

### `swapCase`

The `swapCase()` method returns a new version of the string with its character cases swapped. All uppercase characters are converted to lowercase, and all lowercase characters are converted to uppercase, while non-alphabetic characters remain unchanged.

**Parameters:**
- none.

**Return Value:**
- string.

```php
$string = new Str("Hello, World!");
echo $string->swapCase(); // Output: "hELLO, wORLD!"
```
---

### String Replace Methods

### `replace`

The `replace($search, $replace)` method is used to perform a simple substring replacement within the string. It takes two parameters: `$search`, which represents the substring to be replaced, and `$replace`, which represents the new substring to be inserted in place of the old one.

**Parameters:**
- `$search` (string): The substring to be searched and replaced within the original string.
- `$replace` (string): The new substring that will replace all occurrences of $search in the original string.

**Return Value:**
- string.

```php
$string = new Str("Hello, World!");

echo $string->replace('World', 'Universe'); // Output: "Hello, Universe!"
```

**Note:** The `replace()` method uses PHP's built-in `str_replace()` function to perform the replacement operation, ensuring efficient and consistent results. It can be used within the larger context of the `Str` class to handle more complex string manipulation tasks.

### `trim`

The `replace()` method is used to perform a simple substring replacement within the string. It takes two parameters: `$search`, which represents the substring to be replaced, and `$replace`, which represents the new substring to be inserted in place of the old one.

**Parameters:**
- none.


```php
// Instantiate the Str class with a string containing leading and trailing whitespace.
$string = new Str("   Hello, World!    ");

// Use the trim() method to remove whitespace from the beginning and end of the string.
$trimmedString = $string->trim();

// Output the result
echo $trimmedString; // Output: "Hello, World!"
```

### `trimLeft`

The `trimLeft($characters = null)` method enables easy string manipulation in a PHP application. This method is designed to remove leading whitespace or specific custom characters from the start of the string.

**Parameters:**
- `$characters` (optional): A string containing the custom characters that need to be removed from the start of the string. If `null` (default), only standard whitespace characters (e.g., space, tab, newline) will be removed.


```php
$string = new Str("   Hello, World!   ");

echo $string->trimLeft();          // Output: "Hello, World!   "
echo $string->trimLeft(' Hlo,!');  // Output: "   ello, World!   "
```

### `trimRight`

The `trimLeft($characters = null)` method enables easy string manipulation in a PHP application. This method is designed to remove trailing whitespace from the end of a given string. It offers the flexibility to specify additional characters to remove from the right end of the string, in addition to the standard whitespace characters.

**Parameters:**
- `$characters` (optional): A string containing the custom characters that need to be removed from the start of the string. If `null` (default), only standard whitespace characters (e.g., space, tab, newline) will be removed.


```php
$string = new Str("   Hello, World!   ");

echo $string->trimRight();          // Output: "   Hello, World!"
echo $string->trimRight('! ');      // Output: "   Hello, World"
```

### `remove`

The `trimLeft($substring)` method designed to remove a specific substring from the original string. It employs the `str_replace()` function to replace occurrences of the provided `$substring` with an empty string (''). This effectively removes all instances of the given substring from the original string.

**Parameters:**
- `$substring ` (string): The substring to be removed from the original string.


```php
$string = new Str("Hello, World!");

echo $string->remove(',');       // Output: "Hello World!"
echo $string->remove('l');       // Output: "Heo, Word!"
echo $string->remove('World');   // Output: "Hello, "
```

### `removeAll`

The `removeAll($substring)` method to remove all occurrences of a specific character from the provided string.

**Parameters:**
- `$substring ` (string): The substring to be removed from the original string.


```php
$string = new Str("Hello, World!");

$charToRemove = 'l';
$result = $string->removeAll($charToRemove);

echo $result; // Output: "Heo, Word!"
```

### `removePrefix`

The `removePrefix($substring)` method to remove a specific prefix from the given string, if it exists. It is useful for scenarios where you need to manipulate strings by removing a known prefix, such as removing a common identifier from the beginning of a string.

**Parameters:**
- `$substring ` (string): The prefix that you want to remove from the original string.

```php
$string = new Str("Hello, World!");

$prefixToRemove = "Hello, ";
$newString = $string->removePrefix($prefixToRemove);

echo $newString; // Output: "World!"
```

### `removeSuffix`

The `removeSuffix($substring)` method to remove a specified suffix from the end of the string if it exists. It takes one parameter, `$substring`, which represents the suffix to be removed.

**Parameters:**
- `$substring ` (string): The prefix that you want to remove from the end of the original string.

```php
$string = new Str("Hello, World!");

echo $string->removeSuffix(", World!");   // Output: "Hello"
echo $string->removeSuffix("Hello");      // Output: "Hello, World!"
echo $string->removeSuffix("Universe");   // Output: "Hello, World!" (no change as the suffix doesn't exist)
```

### `stripHtmlTags`

The `stripHtmlTags()` method is a convenience function in the Str class that efficiently removes all HTML tags from the input string, leaving only the plain text content. It utilizes PHP's built-in `strip_tags()` function to perform this task.

**Parameters:**
- none.

```php
$string = new Str("<p>Hello, <strong>World!</strong></p>");
echo $string->stripHtmlTags(); // Output: "Hello, World!"
```

### `replaceMultiple`

The `replaceMultiple($replacements)` method allows to replace multiple occurrences of substrings in the string with corresponding replacement strings. This method takes an associative array of `$replacements` as its parameter, where the keys represent the substrings to be replaced, and the values represent the strings to replace them with.
**Parameters:**
- `$replacements` (array): An associative array containing substrings to be replaced as keys and their corresponding replacement strings as values.

```php
// Instantiate the Str class with a sample string.
$string = new Str("The quick brown fox jumps over the lazy dog.");

// Define the replacements in an associative array.
$replacements = array(
    'quick' => 'swift',
    'brown' => 'red',
    'fox' => 'rabbit',
    'lazy' => 'sleepy'
);

// Use the replaceMultiple() method to perform the replacements.
$result = $string->replaceMultiple($replacements);

// Output the result.
echo $result; 
// Output: "The swift red rabbit jumps over the sleepy dog."
```

### `removeNonAlphanumeric`

The `removeNonAlphanumeric()` method allows to remove all non-alphanumeric characters from a given string. It utilizes regular expressions to perform the removal efficiently.

**Parameters:**
- none.

```php
$string = new Str("Hello, World! 123#");
$result = $string->removeNonAlphanumeric();
echo $result; // Output: "HelloWorld123"
```

### `removeMultiple`

The `removeMultiple($substrings)` method allows to remove all occurrences of multiple substrings from the string. It takes an array of substrings as its parameter and returns the resulting string with the specified substrings removed.

**Parameters:**
- `$substrings` (array): An array containing the substrings to be removed from the original string.

```php
$string = new Str("The quick brown fox jumps over the lazy dog.");

$removeList = ['quick', 'fox', 'lazy'];
$result = $string->removeMultiple($removeList);

echo $result; // Output: "The  brown  jumps over the  dog."
```

### `removeDuplicates`

The `removeMultiple()` method allows to remove duplicate characters from a given string. It utilizes an array-based approach to filter out duplicate characters and returns the resulting string without duplicates.

**Parameters:**
- none.

```php
$string = new Str("abracadabra");
echo $string->removeDuplicates(); // Output: "abrcd"
```


### `removeNonLetters`

The `removeNonLetters()` method allows to remove all non-letter characters (A-Z and a-z) from the given string. It uses a regular expression pattern to match and remove any characters that are not letters, effectively leaving only the alphabetic characters in the resulting string.

**Parameters:**
- none.

```php
$string = new Str("Hello, 123 World!");
echo $string->removeNonLetters(); // Output: "HelloWorld"
```

### Parsing

### `hash`

This method converts the given string into a hash using a specified hashing algorithm. By default, the SHA-256 algorithm is used, but you can choose from various other algorithms supported by PHP's hash() function.
    
**Parameters:**
- `$algorithm`(optional): The hashing algorithm to be used. The default value is 'sha256'. You can provide any hashing algorithm supported by PHP's hash() function, such as 'md5', 'sha1', 'sha512', etc.

```php
$string = new Str("MySecretPassword123");

// Use the default SHA-256 algorithm
echo $string->hash();          // Output: "899694763f7c286b5ef8e53d3914cd0a4091f481d90b9537e1e57f4d36d315af"

// Use the MD5 algorithm
echo $string->hash('md5');     // Output: "4d3e20e0a14a11bbdcda49b17762ee2b"
```

### `toJson`

The `toJson()` method allows to remove all non-letter characters (A-Z and a-z) from the given string. It uses a regular expression pattern to match and remove any characters that are not letters, effectively leaving only the alphabetic characters in the resulting string.    
**Parameters:**
-  none.

```php
// Instantiate the Str class with a sample string
$string = new Str("{'name': 'John', 'age': 30, 'city': 'New York'}");

// Call the toJson() method to convert the string to JSON
$jsonRepresentation = $string->toJson();

// Output the result
echo $jsonRepresentation;
// Output: "{\"name\":\"John\",\"age\":30,\"city\":\"New York\"}"
```

### `toHumanFileSize`

The `toHumanFileSize()` method is used to convert a given string to a human-readable file size representation. It calculates the size of the string in bytes and then formats it with appropriate units (B, KB, MB, GB, or TB) based on its magnitude. 
**Parameters:**
-  none.

```php
$string = new Str("Lorem ipsum dolor sit amet, consectetur adipiscing elit.");
echo $string->toHumanFileSize(); // Output: "66 B"
```

### `toRoman`

The `toRoman()` method converts an integer represented as a string to its Roman numeral representation. The method accepts no parameters and assumes that the string contains a valid integer. It follows the conventional Roman numeral representation, where combinations of letters represent specific numeric values.

**Parameters:**
-  none.

```php
$string = new Str("1984");
echo $string->toRoman();  // Output: "MCMLXXXIV"
```

### `romanToNumber`

The `romanToNumber()` method converts a Roman numeral represented by the input string into its corresponding numeric value. This method is useful for converting Roman numeral representations to their numeric equivalents.

**Parameters:**
-  none.

```php
$string = new Str("XIV");
echo $string->romanToNumber();   // Output: 14
```

### `toBinary`

The `toBinary()` method convert the given string into its binary representation. This method iterates through each character of the input string and converts its ASCII value into an 8-bit binary representation. The resulting binary strings are concatenated to produce the final binary representation of the entire input string.

**Parameters:**
-  none.

```php
$$string = new Str("Hello, World!");

echo $string->toBinary();   // Output: 0100100001100101011011000110110001101111001000000101011101101111011100100110110001100100
```

### `toHex`

The `toHex()` method is used to convert a given string into its hexadecimal representation. It returns a string containing the hexadecimal representation of each character in the original string.

**Parameters:**
-  none.

```php
$string = new Str("Hello, World!");
echo $string->toHex();  // Output: "48656c6c6f2c20576f726c64"
```

### `numbersToWords`

The `numbersToWords()` method converts numeric values to their corresponding word representations. It uses the `NumberFormatter` class, available in PHP 5.3 and above with the `php_intl` extension, to spell out the given number in words. The method provides an optional parameter to specify the language in which the words should be generated, with English (`en`) as the default language.

**Parameters:**
- `$number` (optional, default: `0`): The numeric value that needs to be converted to words. It can be an integer or a float value.
- `$lang` (optional, default: '`en`'): The two-letter language code representing the desired language for word generation. Supported languages include:
    - English (`en`)
    - French (`fr`)
    - Spanish (`es`)
    - Italian (`it`)
    - German (`de`)
    - Portuguese (`pt`)
    - Russian (`ru`)
    - Dutch (`nl`)
    - Polish (`pl`)
    - Ukrainian (`ua`).

```php
$string = new Str();

echo $string->numbersToWords(12345.67, 'en'); // Output: "twelve thousand three hundred forty-five and sixty-seven"
echo $string->numbersToWords(12345.67, 'fr'); // Output: "douze mille trois cent quarante-cinq et soixante-sept"
echo $string->numbersToWords(12345.67, 'es'); // Output: "doce mil trescientos cuarenta y cinco y sesenta y siete"
// ... and more language options available.
```

### Extract

### `extractChars`

The `extractChars()` method is used to split the given string into an array of individual characters, preserving multibyte characters and ignoring empty elements. This function is particularly useful when you need to process each character of a string individually.

**Parameters:**
-  none.

```php
$string = new Str("Hello, World!");
$chars = $string->extractChars();

print_r($chars);
/* Returns:
Array
(
    [0] => H
    [1] => e
    [2] => l
    [3] => l
    [4] => o
    [5] => ,
    [6] =>
    [7] => W
    [8] => o
    [9] => r
    [10] => l
    [11] => d
    [12] => !
)
*/
```

### `getFirstNChars`

The `getFirstNChars()` method allows to extract the first `$n` characters from a given string. It is a straightforward and efficient way to obtain a substring of fixed length from the beginning of the string.

**Parameters:**
-  `$n` (int): The number of characters to extract from the start of the string.

```php
$string = new StringHelper("Hello, World!");

echo $string->getFirstNChars(5);   // Output: "Hello"
echo $string->getFirstNChars(7);   // Output: "Hello, "
echo $string->getFirstNChars(0);   // Output: ""
```
**Note:** The method returns an empty string if `$n` is zero or negative. If `$n` is greater than the length of the string, it returns the entire string. The `getFirstNChars()` method is useful for situations where you need to extract a specific prefix or fixed-length substring from the original string.


### `getLastChars`

The `getLastChars()` method allows to extract the last $n characters from a given string. The method takes an integer parameter, $n, representing the number of characters to retrieve from the end of the string.

**Parameters:**
-  `$n` (int): The number of characters to extract from the end of the string.

```php
$string = new StringHelper("Hello, World!");

// Extract the last 5 characters
$lastChars = $string->getLastChars(5);

echo $lastChars; // Output: "World"
```

### `extractWords`

The `extractWords()` method allows  to extract an array of words from the given string, splitting the string based on whitespace (spaces, tabs, or newlines).

**Parameters:**
-  none.

```php
$string = new StringHelper("Hello, World! How are you?");
$wordsArray = $string->extractWords();

// Output: Array ( [0] => "Hello," [1] => "World!" [2] => "How" [3] => "are" [4] => "you?" )
print_r($wordsArray);
```

### `extractLines`

The `extractLines()` method allows to extract individual lines from a given string and return them as an array. This method splits the input string based on line breaks (`\r\n`, `\n`, or `\r`) and separates each line into distinct elements of the resulting array.

**Parameters:**
-  none.

```php
$string = new StringHelper("Hello, World!\nHow are you?\nI'm doing fine.");

// Call the extractLines() method
$linesArray = $string->extractLines();

// Output the array of lines
print_r($linesArray);

/* Output: Array
(
    [0] => Hello, World!
    [1] => How are you?
    [2] => I'm doing fine.
)
*/
```

### `extractWordsReverse`

The `extractWordsReverse()` method allows to extract words from the given string and return them as an array in reverse order. This method can be particularly useful when dealing with natural language processing or text analysis tasks where the words need to be processed in reverse sequence.

**Parameters:**
-  none.

```php
$string = new StringHelper("The quick brown fox jumps over the lazy dog");

$words = $string->extractWordsReverse();

print_r($words);


/* Output: Array
(
    [0] => dog
    [1] => lazy
    [2] => the
    [3] => over
    [4] => jumps
    [5] => fox
    [6] => brown
    [7] => quick
    [8] => The
)
*/
```

### `extract`

The `extract()` method allows to extract a substring from the original string based on the provided starting position and, optionally, a specified length.

**Parameters:**
- `$start` (integer): The starting position from which to begin extracting the substring. The index is zero-based, where the first character has an index of 0, the second character has an index of 1, and so on.
- `$length` (integer, optional): The length of the substring to extract. If not provided, the method will extract all characters from the starting position to the end of the original string.

```php
$string = new StringHelper("Hello, World!");

echo $string->extract(0, 5); // Output: "Hello"
echo $string->extract(7);    // Output: "World!"
```
In the first example, we use the `extract()`method to extract the first five characters from the original string, resulting in "Hello". In the second example, we only specify the starting position, and thus the method extracts all characters from the index 7 onwards, resulting in "World!". This versatile method is useful for retrieving specific parts of a string, such as substrings or sections of interest, based on given positions and lengths.

### `firstOccurrence`

The `firstOccurrence()` method allows to retrieve the substring from the beginning of the string up to the first occurrence of a specified substring. If the given substring is not found, an empty string is returned.

**Parameters:**
- `$substring` (string): The substring to search for in the original string.

```php
$string = new StringHelper("This is an example string.");

// Get the first occurrence of "is"
$result = $string->firstOccurrence("is");

echo $result; // Output: "This is"
```
In this example, the `firstOccurrence()` method searches for the first occurrence of the substring "is" in the original string "This is an example string." It then returns the substring "This is" that appears before the first occurrence of "is."


### `lastOccurrence`

The `lastOccurrence()` method returns the substring of the original string that occurs last in the provided substring.

**Parameters:**
- `$substring` (string): The substring to search for in the original string.

```php
$string = new StringHelper("Lorem ipsum dolor sit amet, consectetur adipiscing elit.");
$lastOccurrence = $string->lastOccurrence("sit");
echo $lastOccurrence; // Output: "sit amet, consectetur adipiscing elit."

```

### `substringBetween`

The `substringBetween()` method extracts the substring from a given string that is located between two specified substrings, $start and $end. It returns the extracted substring or an empty string if either the start or end substring is not found.

**Parameters:**
- `$start` (string): The starting substring to identify the beginning of the desired substring.
- `$end` (string): The ending substring to identify the end of the desired substring.

```php
$string = new StringHelper("The quick brown fox jumps over the lazy dog.");

// Extract the substring between "quick" and "jumps"
$result = $string->substringBetween("quick", "jumps");
echo $result; // Output: " brown fox "

// Extract the substring between "the" and "dog"
$result = $string->substringBetween("the", "dog");
echo $result; // Output: " quick brown fox jumps over the lazy "

// Substrings not found, returns an empty string
$result = $string->substringBetween("brown", "jumps");
echo $result; // Output: ""
```
**Note:** The `substringBetween` method looks for the first occurrence of the `$start` substring and then searches for the `$end` substring after the `$start` position. If both substrings are found, it returns the substring between them. If either `$start` or `$end` is not present in the string, it returns an empty string.

### `fromNthOccurrence`

The `fromNthOccurrence()` method is used to retrieve a substring from the nth occurrence of a specified substring within the original string. It allows developers to extract portions of the string based on occurrence positions, enabling various text extraction scenarios.

**Parameters:**
- `$substring` (string): The substring to search for within the original string.
- `$n` (int): The occurrence index (1-based) from which the extraction should start.

```php
$string = new StringHelper("The quick brown fox jumps over the lazy dog.");

$substring = $string->fromNthOccurrence('o', 2);
echo $substring; // Output: "umps over the lazy dog."
```
**Note:** In the example above, the `fromNthOccurrence` method is used to find the second occurrence of the substring "o" within the original string. It returns the substring starting from that position, resulting in the output "umps over the lazy dog." This function is particularly useful for extracting specific text segments based on the number of occurrences within a longer string.


### `untilNthOccurrence`

The `untilNthOccurrence()` method extracts the substring from the beginning of the original string up to the nth occurrence of a specified substring. If the substring does not occur at least n times, it returns an empty string.

**Parameters:**
- `$substring` (string): The substring to search for in the original string.
- `$n` (int): The desired occurrence number (1-indexed) of the `$substring` to extract the substring until.

```php
$string = new StringHelper("Lorem ipsum dolor sit amet, consectetur adipiscing elit.");

$result = $string->untilNthOccurrence(' ', 3);
echo $result; // Output: "Lorem ipsum dolor"
```
**Note:** In the example above, the method `untilNthOccurrence(' ', 3)` finds the third occurrence of a space (" ") in the original string and returns the substring up to that point, resulting in the string "Lorem ipsum dolor". If the specified substring does not occur at least three times, the method will return an empty string.

### `betweenNthOccurrences`

The `betweenNthOccurrences()` method extracts the substring between the nth and mth occurrences of a specified substring within the original string.

**Parameters:**
- `$substring` (string): The substring to search for and locate occurrences.
- `$n` (int): The nth occurrence of the substring to begin the extraction.
- `$m` (int): The mth occurrence of the substring to end the extraction.

```php
$string = new StringHelper("the quick brown fox jumps over the lazy dog.");

$result = $string->betweenNthOccurrences("the", 1, 2);
echo $result; // Output: " quick brown fox jumps over "
```
**Note:** In the above example, the `betweenNthOccurrences` method is used to extract the substring occurring between the 1st and 2nd occurrences of the word "the" (case-sensitive) in the original string. The extracted substring is then stored in the `$result` variable and subsequently displayed.


### `afterLast`

The `afterLast()` method retrieves the substring that appears after the last occurrence of a specified substring within the original string. If the substring is not found, an empty string is returned.

**Parameters:**
- `$substring` (string): The substring to search for within the original string.

```php
$string = new StringHelper("This is a sample text. This text is used for demonstration purposes.");

$substring = "is";
$result = $string->afterLast($substring);

echo $result; // Output: " used for demonstration purposes."
```

### `beforeLast`

The `beforeLast()` method retrieves  the substring before the last occurrence of a given substring within the original string. It helps simplify tasks where you need to extract a portion of the string leading up to a specific marker or delimiter.

**Parameters:**
- `$substring` (string): The substring used as the marker to locate the last occurrence in the original string.

```php
$string = new StringHelper("Hello, World! How are you?");
$substring = "l";
$result = $string->beforeLast($substring);

echo $result; // Output: "Hello, World! How are you?"
```

### `extractUrls`

The `extractUrls()` method extract URLs from the given string. It uses regular expressions to find all occurrences of URLs, including both HTTP(S) and www URLs. The method returns an array containing all the extracted URLs found in the string.

**Parameters:**
- none.

```php
$string = new StringHelper("Visit our website at https://www.example.com. For more information, check out http://blog.example.com.");

$urls = $string->extractUrls();
print_r($urls);
/* Output: 
Array
(
    [0] => https://www.example.com
    [1] => http://blog.example.com
)
*/
```

### `extractEmails`

The `extractEmails()` method extract email addresses from a given string. It utilizes a regular expression pattern to identify and retrieve all valid email addresses contained within the input string.

**Parameters:**
- none.

```php
$string = new StringHelper("Contact us at info@example.com or support@example.org for assistance.");
$emails = $string->extractEmails();

print_r($emails);
$string = new StringHelper("Contact us at info@example.com or support@example.org for assistance.");
$emails = $string->extractEmails();

print_r($emails);

/* Output: 
Array
(
    [0] => info@example.com
    [1] => support@example.org
)
*/
```

### `extractPhoneNumbers`

The `extractPhoneNumbers()` method extract phone numbers from a given string. It employs a regular expression pattern to identify phone number patterns and returns an array of all the matched phone numbers found within the string.

**Parameters:**
- none.

```php
$string = new StringHelper("Contact us at +1 (123) 456-7890 or 987-654-3210 for assistance.");

$phoneNumbers = $string->extractPhoneNumbers();
print_r($phoneNumbers);

/* Output: 
Array
(
    [0] => +1 (123) 456-7890
    [1] => 987-654-3210
)
*/
```

### `extractIPv4`

The `extractIPv4()` method extract all IPv4 addresses present in a given string. This method utilizes regular expressions to identify valid IPv4 addresses and returns them as an array.

**Parameters:**
- none.

```php
$string = new StringHelper("Lorem ipsum 192.168.1.1 dolor sit amet, consectetur 10.0.0.1 adipiscing elit.");

$ipv4Addresses = $string->extractIPv4();
print_r($ipv4Addresses);

/* Output: 
Array
(
    [0] => 192.168.1.1
    [1] => 10.0.0.1
)
*/
```

### `extractIPv6Addresses`

The `extractIPv4()` method extract IPv6 addresses from a given string. It uses regular expressions to find all occurrences of valid IPv6 addresses within the input string and returns them as an array.

**Parameters:**
- none.

```php
$string = new StringHelper("The server has the following IPv6 addresses: 2001:0db8:85a3:0000:0000:8a2e:0370:7334 and 2001:0db8:85a3:0000:0000:8a2e:0370:7335");

$ipv6Addresses = $string->extractIPv6Addresses();
print_r($ipv6Addresses);

/* Output: 
Array
(
    [0] => 2001:0db8:85a3:0000:0000:8a2e:0370:7334
    [1] => 2001:0db8:85a3:0000:0000:8a2e:0370:7335
)
*/
```

### `ord`

The `ord()` method retrieve the ASCII value of the first character in the provided string.

**Parameters:**
- none.

```php
$string = new StringHelper("Hello");
echo $string->ord(); // Output: 72 (ASCII value of 'H')
```
The `ord()` method can be used whenever there is a need to retrieve the ASCII value of the first character in a string. It can be particularly useful when dealing with character encoding, comparing characters, or performing other low-level string operations.


### `longestCommonPrefix`

The `longestCommonPrefix()` method returns the longest common prefix between the current string and the given `$otherStr`. It determines the characters that are common at the beginning of both strings and constructs the prefix accordingly.

**Parameters:**
- `$otherStr` (string): The string to compare with the current string for finding the longest common prefix.

```php
$string = new StringHelper("apple");
$otherStr = "applesauce";

$prefix = $string->longestCommonPrefix($otherStr);
echo $prefix; // Output: "app"
```
In this example, the `longestCommonPrefix` method is used to find the longest common prefix between the strings `"apple"` and `"applesauce"` resulting in the output `"app"` This method is particularly useful for scenarios where you need to identify shared prefixes in different strings, such as when handling file paths or variable names in a program.

### `longestCommonSuffix `

The `longestCommonSuffix()` method returns the longest common suffix between the current string and the given `$otherStr`. It determines the characters that are common at the end of both strings and constructs the suffix accordingly.

**Parameters:**
- `$otherStr` (string): The string to compare with the current string for finding the longest common suffix.

```php
$string = new StringHelper("apple");
$otherStr = "pineapple";

$suffix = $string->longestCommonSuffix($otherStr);
echo $suffix; // Output: "apple"
```
In this example, the `longestCommonSuffix` method is called on the `$string` object with the `$otherStr` being `"pineapple"` The method finds the longest common suffix between `"apple"` and `"pineapple"` which is "`apple"` and returns it as the result.

### `longestCommonSubstring `

The `longestCommonSubstring()` method finds the longest common substring between two given strings. It takes one parameter, `$otherStr`, which represents the second string to compare with the original string.

**Parameters:**
- `$otherStr` (string): The string to compare with the current string for finding the longest common substring.

```php
$string1 = new StringHelper("programming");
$string2 = "programmer";

$result = $string1->longestCommonSubstring($string2);
echo $result; // Output: "gramm"
```
In this example, the method is called on a `Str` instance with the original string "programming." The second string "programmer" is passed as an argument. The method calculates the longest common substring between the two strings and returns "gramm" as the result.


### Count


### `length `

The `length()` method allows to quickly determine the length of a given string. It calculates the number of characters present in the string and returns the count as an integer.

**Parameters:**
- none.

```php
// Instantiate the StringHelper class with the string "Hello, World!"
$string = new StringHelper("Hello, World!");

// Call the length() method to get the length of the string
$length = $string->length();

// Output the result
echo $length; // Output: 13
```

### `countCharacters `

The `countCharacters()` method allows determine the number of characters in the given string. It calculates the length of the string and returns the count as an integer value.

**Parameters:**
- none.

```php
$string = new StringHelper("Hello, World!");
$characterCount = $string->countCharacters();

echo $characterCount; // Output: 13
```

### `countWords`

The `countWords()` method is used to count the number of words in the given string.

**Parameters:**
- none.

```php
$string = new StringHelper("Hello, this is a sample text with multiple words.");

// Call the countWords() method to get the number of words in the string
$wordCount = $string->countWords();

echo $wordCount; // Output: 10
```

### `countLines`

The `countLines()` method is used to count the number of lines in a given string. It splits the string into an array of lines using regular expressions to detect line breaks (`\r\n`, `\n`, or `\r`), and then returns the total count of lines found.

**Parameters:**
- none.

```php
$string = new StringHelper("Hello, World!\nHow are you?\nI'm doing fine.");

// Call the countLines() method to get the number of lines in the string
$lineCount = $string->countLines();

// Output: 3
echo $lineCount;
```

### `countWhitespaces`

The `countWhitespaces()` method is used to count the number of whitespace characters (spaces, tabs, newlines) present in a given string. It uses regular expression matching to efficiently find all whitespace occurrences and returns their count.

**Parameters:**
- none.

```php
$string = new StringHelper("Hello,   World!\nHow\tare you?");

echo $string->countWhitespaces(); // Output: 6 (1 space, 3 spaces, 1 newline, 1 tab)
```

### `countOccurrences`

The `countOccurrences()` method is used to count the number of occurrences of a specified substring within the given string.

**Parameters:**
- none.

```php
// Instantiate the StringHelper class with a sample string
$string = new StringHelper("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.");

// Count the occurrences of the substring "Lorem"
$count = $string->countOccurrences("Lorem");

echo $count; // Output: 2
```



















---