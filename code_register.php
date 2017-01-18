<?php
/**
 * Created by IntelliJ IDEA.
 * User: Albina
 * Date: 08.06.2016
 * Time: 21:07
 */
include 'functions.php';

$fname = $_POST['fname'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];
$number = $_POST['number'];
$code = $_POST['code'];

save_code($fname, $name, $lname, $birthday, $phone, $number, $code);
send_sms($phone);