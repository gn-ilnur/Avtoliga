<?php
/**
 * Created by IntelliJ IDEA.
 * User: Albina
 * Date: 08.06.2016
 * Time: 20:43x
 */
include 'SimpleOrm.class.php';
include 'constants.php';

class Code extends SimpleOrm {}

class Codes extends SimpleOrm {}

function send_sms($phone)
{
    $stream = fopen("https://smsc.ru/sys/send.php?login=".SMS_LOGIN.
                        "&psw=".SMS_PSWD."&phones={$phone}&mes=Поздравляем, вы успешно зарегистрировали код&sender=".SMS_SENDER."&fmt=3&charset='utf-8'",
                    "r");

    $result = fread($stream, 120);
    fclose($stream);

    $result_json = json_decode($result);
    if (isset($result_json->error_code)) {
        send_email_to_admin($result_json->error_code);
    }

    header('Location: success.html');
    exit;
}

function send_email($email, $name, $subject)
{
    $message = "Пользователь {$name} задал вопрос: <br /> {$subject} <br /><br /><br /> Email для связи: {$email}";

    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: Avtoliga  <15.avtoliga@avtoliga.pro>' . "\r\n";

    mail(ADMIN_EMAIL, "Вам отправили новый вопрос", $message, $headers);
}

function send_email_to_admin($error)
{
    $message = "При отправке очередного sms произошла ошибка с кодом: {$error}. <br />Подробнее об ошибках: http://smsc.ru/api/soap/#send";

    // Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: Avtoliga  <15.avtoliga@avtoliga.pro>' . "\r\n";

    mail(ADMIN_EMAIL, "На сайте проведения конкурса произошла ошибка", $message, $headers);
}

function get_competitors() {
    $conn = new mysqli('localhost', DB_LOGIN, DB_PASS);
    $conn->set_charset("utf8");
    SimpleOrm::useConnection($conn, 'avtoliga');

    return Code::sql("SELECT fname, name, lname, COUNT( * ) AS count FROM :table GROUP BY fname, name, lname ORDER BY count DESC");
}

function save_code($fname, $name, $lname, $birthday, $phone, $number, $code) {
    $conn = new mysqli('localhost', DB_LOGIN, DB_PASS);
    $conn->set_charset("utf8");
    SimpleOrm::useConnection($conn, 'avtoliga');

    $code_exists = Codes::sql("SELECT 1 FROM :table WHERE codes='".trim($code)."'");
    if (!empty($code_exists) &&
        isset($fname) && $fname != '' &&
        isset($name) && $name != '' &&
        isset($lname) && $lname != '' &&
        isset($birthday) && $birthday != '' &&
        isset($phone) && $phone != '' &&
        isset($number) && $number != '' &&
        isset($code) && $code != '' ) {

        $entry = new Code();
        $entry->fname = trim($fname);
        $entry->name = trim($name);
        $entry->lname = trim($lname);
        $entry->birthday = trim($birthday);
        $entry->phone = trim($phone);
        $entry->number = trim($number);
        $entry->code = trim($code);

        $entry->save();
    } else {
        header('Location: error.html');
        exit;
    }

}