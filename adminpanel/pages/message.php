<?php
require("header.php");
// Отправка письма

function intFilter($val)
{
    if (isset($val)) {
        if (is_int($val)) {
            return $val;
        } else {
            if (is_numeric($val)) {
                return intval($val);
            } else {
                return 0;
            }
        }
    } else {
        return 0;
    }
}

function validMaill($val)
{
    
   return preg_match('/@/', $val);
     
}

$sansize = new Sansize();

$name = $sansize->getrequest('username');
$tel = $sansize->getrequest('usertel');
$mail = $sansize->getrequestEmail('usermail');
$tema = $sansize->getrequest('theme');
$content = $sansize->getrequest('message');
$lang = $sansize->getrequest('lang');
$nameh = intFilter($sansize->getrequestInt('namehidden'));
$telh = intFilter($sansize->getrequestInt('telhidden'));
$mailh = intFilter($sansize->getrequestInt('mailhidden'));
$temah = intFilter($sansize->getrequestInt('themehidden'));
$contenth = intFilter($sansize->getrequestInt('messagehidden'));
$countform = $nameh + $telh  + $mailh + $temah + $contenth;
$countformto = strlen($name) + strlen($tel) + strlen($mail) + strlen($tema) + strlen($content);

$x = intFilter($sansize->getrequest('mx'));
$y = intFilter($sansize->getrequest('my'));
if($lang == "md"){
    $connect = "Mesaj trimis!"; 
    $errorMesage = "Eroare! Mesajul nu a fost trimis. Nu toate câmpurile formularului sunt completate.";  
    $errorMaill = "Adresa email invalida";
}else{
    $connect = "Сообщение отправлено!";
    $errorMesage = "Ошибка! Сообщение не отправлено. Не все поля формы заполнены.";
    $errorMaill = "Неправильный адрес электронной почты";
}



if ($countform != 0 && $countformto != 0) {
    if ($nameh != 0 && $telh != 0 && $mailh != 0 && $temah != 0 && $contenth != 0 && $x > 0 && $y > 0) {
        if(validMaill($mail)){
            new DMail('19197908an@mail.ru', 'sandaniprim<noreply@sandaniprim.md>', $tema, ['name' => 'Ф. И. О: ' . $name, 'Телефон: ' . 'tel' => $tel, 'mail' => 'Почта: ' . $mail, 'message' => $content]);
       echo json_encode([$connect,1]);
        // header('location:/message.html?id=Сообщение отправлено!');
        }else{
            echo json_encode([$errorMaill,0]) ;
        }
        
    } else {
       echo json_encode([$errorMesage,0]);
       // header('location:/message.html?id=Ошибка! Сообщение не отправлено');
    }
}
