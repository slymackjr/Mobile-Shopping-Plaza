<?php
// super class for the other classes which they inherit from.
class Shopping
{
    public ?DBController $db = null;

    // constructor for the class which is inherited by other classes,
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // method to clean any harmful entry such harmful code etc.
    public function sanitizeString($variable): array|bool|string
    {
        $variable = strip_tags($variable);
        $variable = htmlentities($variable);
        $variable = stripslashes($variable);
        $result = "'".$variable."'"; // This adds single quotes
        return str_replace("'", "", $result); // So now remove them
    }

    // method for returning date in the specified format.
    public function longDate($timestamp): string
    {
        return date("l, F jS Y H",$timestamp);
    }

    // method to handle numbers like thousands and millions and put it in short format like K or M.
    public function number_format_short( $n, $precision = 1 ): string
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
        // Remove unnecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotZero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotZero, '', $n_format );
        }
        return $n_format . $suffix;
    }



}