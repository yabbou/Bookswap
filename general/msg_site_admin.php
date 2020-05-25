<?php include 'contact_us.php'; 

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

        $to = 'bookswap2020@gmail.com';
        $subject = 'Bookswap message';
        $message = "Email: ".$formEntries['email']."\n".$formEntries['msg'];
        $header = 'From: ' . $formEntries['name'];

        if (mail($to, $subject, $message, $header)) {
            echo 'Message sent.';
        } else {
            echo 'Message was not sent. Please try again.';
        }
    }
}
