<?php

function gravatar_url($email, $size) {
    return 'http://www.gravatar.com/avatar/' . md5($email) . '?s=' . $size;
}