<?php
class ResetPasswordForm extends CFormModel
{
    public $newPassword;
    public $confirmPassword;
    
    public function rules()
    {
        return [
            ['newPassword, confirmPassword', 'required'],
            array(
                'newPassword', 'match', 'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'message' => 'Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
            ),
              ['confirmPassword', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
}