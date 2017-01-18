<?php
/**
 * Created by IntelliJ IDEA.
 * User: Albina
 * Date: 08.06.2016
 * Time: 23:05
 */
include 'functions.php';

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

send_email($email, $name, $comment);
header('Location: index.html');
exit;