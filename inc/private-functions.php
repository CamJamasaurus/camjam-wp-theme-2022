<?php

function _browser_supports_webp() {
    if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp')) {
        return true;
    }
    return false;
}