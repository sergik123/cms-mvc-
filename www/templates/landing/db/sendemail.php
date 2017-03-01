<?php	

    $name       = @trim(stripslashes($_POST['name'])); 

    $email      = @trim(stripslashes($_POST['email'])); 

    $dostavka    = @trim(stripslashes($_POST['dostavka'])); 

    

    $email_from = $email;

    $email_to = 'timeforyou@mail.ua';//replace with your email



    $body = "\r\n".'Email или телефон: ' . $email ."\r\n"

    .  'Имя: '. $name . "\r\n" 

    .  'Товар: '. 'ROLEX Daytona' . "\r\n" 

    .  'способ доставки: '. $dostavka. "\r\n";



    $success = @mail($email_to, "Rolex Daytona", $body, 'From: <'.$email_from.'>');

?>



<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <title></title>

</head>

<body>

    <h1>Спасибо за покупку в нашем магазине. Скоро с вами свяжется наш менеджер и уточнит все детали</h1>

   <h3> <a href="/">Вернуться на главную страницу</a> </h3>

</body>

</html>

  

    