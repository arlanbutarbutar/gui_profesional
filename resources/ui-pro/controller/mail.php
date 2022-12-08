<?php
require_once("../assets/phpmailer/PHPMailerAutoload.php");
function smtp_mail($to, $subject, $message, $from_name, $from, $cc, $bcc, $debug = false)
{
  $mail = new PHPMailer;
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->ClearAddresses();
  $mail->ClearCCs();
  $mail->ClearBCCs();
  $mail->SMTPAuth         = true;
  $mail->Host             = "domain;ip";
  $mail->Port             = 587;
  $mail->SMTPSecure       = "tls";
  $mail->Username         = "email";
  $mail->Password         = "password-email";
  $default_email_from     = "email";
  $default_email_from_name = "Communication";
  if (empty($from)) $mail->From = $default_email_from;
  else $mail->From = $from;
  if (empty($from_name)) $mail->FromName = $default_email_from_name;
  else $mail->FromName = $from_name;
  if (is_array($to)) {
    foreach ($to as $k => $v) {
      $mail->addAddress($v);
    }
  } else {
    $mail->addAddress($to);
  }
  if (!empty($cc)) {
    if (is_array($cc)) {
      foreach ($cc as $k => $v) {
        $mail->addCC($v);
      }
    } else {
      $mail->addCC($cc);
    }
  }
  if (!empty($bcc)) {
    if (is_array($bcc)) {
      foreach ($bcc as $k => $v) {
        $mail->addBCC($v);
      }
    } else {
      $mail->addBCC($bcc);
    }
  }
  $mail->isHTML(true);
  $mail->Subject     = $subject;
  $mail->Body       = $message;
  $mail->AltBody    = $message;
  if (!$mail->send())
    return 1;
  else
    return 0;
}
