<?php

function gravatar_url($email, $size) {
    return 'http://www.gravatar.com/avatar/' . md5($email) . '?s=' . $size;
}

function SentenceCase($string) {

    $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
    $new_string = '';
    foreach ($sentences as $key => $sentence) {
        $new_string .= ($key & 1) == 0?
            ucfirst(strtolower(trim($sentence))) :
            $sentence.' ';
    }
    return trim($new_string);
}

function ProperCase($string) {
    return ucwords(strtolower($string));
}