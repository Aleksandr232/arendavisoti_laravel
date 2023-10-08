<?php

/* https://api.telegram.org/bot5784348887:AAEf498gjGd0gXuH6nfJC3KpjV_w1lWsot4/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */


$name = $_POST['name'];
$phone = $_POST['phone'];
$hidden = $_POST['hidden'];
$token = '5784348887:AAEf498gjGd0gXuH6nfJC3KpjV_w1lWsot4';
$chat_id = '-1001803523687';

$arr = array(
    'Заявка: ' => $hidden,
    'Имя пользователя: ' => $name,
    'Телефон: ' => $phone,


  );

  foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  };

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", 'r');

    /* if ($sendToTelegram) {
        header('location: thanks.php');
        exit();
    } else {
        header('Location: error.php');
        exit();
    } */
?>
