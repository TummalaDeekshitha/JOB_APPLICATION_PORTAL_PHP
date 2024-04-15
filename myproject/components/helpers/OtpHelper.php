<?php
use app\helpers\Mailhelper;
class OtpHelper extends CComponent
{

    public static function sendOtp()
    {
        $otp = rand(100000, 999999);
        Yii::app()->session['otp'] = $otp;
        $time = time();
        Yii::app()->session['time'] = $time;
       return $otp;
    }
    public static function verifyOtp($user_otp)
    {

        $time = Yii::app()->session['time'] + 60;

        $cur = time();


        if ($cur <= $time) {
            $otp = Yii::app()->session['otp'];
            if ($otp == $user_otp) {
                unset(Yii::app()->session['otp']);
                return 1;
            } else {
                unset(Yii::app()->session['otp']);
                return 0;
            }
           
        } else {
            return "Your Otp expired try again";
        }
    }
}
