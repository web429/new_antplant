<?php
function formspecialchars($var)
    {
        $pattern = '/&(#)?[a-zA-Z0-9]{0,};/';
       
        if (is_array($var)) {    // If variable is an array
            $out = array();      // Set output as an array
            foreach ($var as $key => $v) {     
                $out[$key] = formspecialchars($v);         // Run formspecialchars on every element of the array and return the result. Also maintains the keys.
            }
        } else {
            $out = $var;
            while (preg_match($pattern,$out) > 0) {
                $out = htmlspecialchars_decode($out,ENT_QUOTES);      
            }                            
            $out = htmlspecialchars(stripslashes(trim($out)), ENT_QUOTES,'UTF-8',true);     // Trim the variable, strip all slashes, and encode it
           
        }
       
        return $out;
    }
?>