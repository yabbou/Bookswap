<?php
include_once 'header.php';
include 'contact_us.html';

$formEntries = array(
    'name' => filter_input(INPUT_POST, 'nameEntry'),
    'email' => filter_input(INPUT_POST, 'emailEntry'),
    'msg' => filter_input(INPUT_POST, 'msgEntry')
);

foreach ($formEntries as $i => $entry) {
    if (!isset($entry) || empty($entry)) {
        echo 'All fields are required.';
        break;
    } else if ($entry === $formEntries['msg']) {
        $format = "From: %s\nEmail: %s\n\n Message: %s";
        $_SESSION['emailBody'] = sprintf($format, $formEntries['name'], $formEntries['email'], $formEntries['msg']);
        include 'mail-server.php';
    }
}

include_once 'footer.php';
