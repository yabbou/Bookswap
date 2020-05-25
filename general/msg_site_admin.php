<?php 

$formEntries = array(
    'name' => filter_input(INPUT_POST, 'nameEntry'),
    'email' => filter_input(INPUT_POST, 'emailEntry'),
    'msg' => filter_input(INPUT_POST, 'msgEntry')
);

foreach ($formEntries as $i => $entry) {
    if (!isset($entry) || empty($entry)) {
        echo 'All fields are required.'; // move to above footer
        break;
    } else if ($entry == 'msg') { //convert to without ifelse? //dry
        $to = 'bookswap2020@gmail.com';
        $subject = 'Bookswap message';
        $message = print_r($formEntries);
        $header = 'From: '. $formEntries['name'];

        if(mail($to, $subject, $message, $header)){
        echo 'Message sent.';
    }        else        {
        echo 'Message was not sent. Please try again.'}
    }
}

echo "<meta http-equiv=\"refresh\" content=\"5;URL=contact_us.php\" />";


