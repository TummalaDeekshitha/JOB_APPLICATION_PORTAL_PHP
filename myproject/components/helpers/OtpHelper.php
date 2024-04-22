<?php
class OtpHelper 
{

    public static function sendOtp($email)
    {
        $otp = rand(100000, 999999);
        // Yii::app()->session['otp'] = $otp;
        Yii::app()->cache->executeCommand('set', [$email, $otp, 'EX', 60 * 5]);
        
       return $otp;
    }
    public static function verifyOtp($email,$otp)
    {

        // $time = Yii::app()->session['time'] + 60;

        // $cur = time();


        // if ($cur <= $time) {
        //     $otp = Yii::app()->session['otp'];
        //     if ($otp == $user_otp) {
        //         unset(Yii::app()->session['otp']);
        //         return 1;
        //     } else {
        //         unset(Yii::app()->session['otp']);
        //         return 0;
        //     }
           
        // } else {
        //     return "Your Otp expired try again";
        // }
        $redisOTP = Yii::app()->cache->executeCommand("get", [$email]);
        if ($redisOTP === $otp) {
            return  1;
        } else {
            return 0;
        }

    }
}
