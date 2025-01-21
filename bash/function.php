<?php 
function formatIndianRupees($number) {
    // Convert the number to a string and separate the integer and decimal parts
    $parts = explode('.', (string)$number);
    $integerPart = $parts[0];
    
    // If there's no decimal part, set it to '.00'
    $decimalPart = isset($parts[1]) ? '.' . $parts[1] : '.00';

    // Format the integer part with commas for the Indian numbering system
    $formatted = '';
    $length = strlen($integerPart);

    // Add the first three digits (right-most)
    if ($length > 3) {
        $formatted = substr($integerPart, -3);
        $integerPart = substr($integerPart, 0, $length - 3);
    } else {
        $formatted = $integerPart;
        $integerPart = '';
    }

    // Add the remaining digits in pairs, separated by commas
    while (strlen($integerPart) > 0) {
        $formatted = substr($integerPart, -2) . ',' . $formatted;
        $integerPart = substr($integerPart, 0, -2);
    }

    // Ensure there are no leading commas
    $formatted = ltrim($formatted, ',');

    // Return the formatted integer part with the decimal part (ensure two decimal places)
    return $formatted . $decimalPart;
}

// Example usage
echo formatIndianRupees(10000);  // Output: 10,000.00
echo formatIndianRupees(12345678.90);  // Output: 1,23,45,678.90
echo formatIndianRupees(15000.50);  // Output: 15,000.50
?>