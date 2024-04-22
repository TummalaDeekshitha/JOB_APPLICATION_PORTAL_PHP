<?php
class PracticeHelper extends CComponent
{
 public static function  sendme()
 {
 $otp=OtpHelper::sendOtp();
 return $otp;
 }
 public static function gotOtp()
 {
    $otp=PracticeHelper::sendme();
    return $otp;
 }


}