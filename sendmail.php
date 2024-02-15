<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML = (true);

    //от кого письмо
    $mail->setFrom('bagmut@bk.ru', 'Александр Багмут')
    //от кого письмо
    $mail->addAdress('bagmut@bk.ru');
    //тема письма
    $mail->Subject = 'Новое письмо';

    //рука
    $hand = 'Правая';
    if($_POST['hand'] == "left") {
        $hand = 'Левая';
    }

    //тело письма
    $body = '<h1>Встречайте супер письмо! </h1>';

    if(trim(!empty($_POST['name']))){
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    
    if(trim(!empty($_POST['email']))){
        $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    }
   
    if(trim(!empty($_POST['hand']))){
        $body.='<p><strong>Рука:</strong> '.$hand.'</p>';
    }
   
    if(trim(!empty($_POST['age']))){
        $body.='<p><strong>Возраст:</strong> '.$_POST['age'].'</p>';
    }
    
    if(trim(!empty($_POST['message']))){
        $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
    }


    //надо дописать отправку файла

    $mail->Body = $body;

    //Отправляем
    if (!$mail->send()) {
        $massage = 'ошибка';
    } else {
        $message = 'Данные отправлены';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>