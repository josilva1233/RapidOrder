<?php

function maskData($data, $type) {
    if ($type === 'document') {
        // Display only the last 4 digits
        return '***' . substr($data, -4);
    } elseif ($type === 'email') {
        // Display only the first character before "@" and the last 4 characters
        $parts = explode('@', $data);
        return substr($parts[0], 0, 1) . '****@' . $parts[1];
    } elseif ($type === 'phone') {
        // Display only the last 4 digits
        return '***' . substr($data, -4);
    }
}
