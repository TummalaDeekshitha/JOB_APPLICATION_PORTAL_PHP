<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class AuthFilter extends CFilter{
    protected function preFilter($filterChain)
    {
       	if(isset(Yii::app()->session['jwtToken'])){
			try{
                $token=Yii::app()->session['jwtToken'];
                $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
				if(isset($decoded->data->email) ){
					if($decoded->data->role=="user" || $decoded->data->role=="admin" ){

					return true;
					}
					else
					{
						$url=Yii::app()->createUrl('myproject/signinform');
						Yii::app()->getRequest()->redirect($url);
						return false;
					}
				}else{
					$url=Yii::app()->createUrl('myproject/signinform');
				Yii::app()->getRequest()->redirect($url);
				return false;
				}
			}
			catch(exception $e){
				$url=Yii::app()->createUrl('myproject/signinform');
				Yii::app()->getRequest()->redirect($url);
				return false;
			}
		}
		else{
			$url=Yii::app()->createUrl('myproject/signinform');
			Yii::app()->getRequest()->redirect($url);
			return false;
		}
       
    }
}