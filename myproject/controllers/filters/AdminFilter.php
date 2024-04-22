<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class AdminFilter extends CFilter{
    protected function preFilter($filterChain)
    {
       	if(isset(Yii::app()->request->cookies['jwtToken'])){
			try{
                $token=Yii::app()->request->cookies['jwtToken']->value;
                $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
				if(isset($decoded->data->email) ){
					if($decoded->data->role=="admin" ){

					return true;
					}
					else
					{
						$url=Yii::app()->createUrl('myproject/index');
						Yii::app()->getRequest()->redirect($url);
						return false;
					}
				}else{
					$url=Yii::app()->createUrl('myproject/index');
				Yii::app()->getRequest()->redirect($url);
				return false;
				}
			}
			catch(exception $e){
				$url=Yii::app()->createUrl('myproject/index');
				Yii::app()->getRequest()->redirect($url);
				return false;
			}
		}
		else{
			$url=Yii::app()->createUrl('myproject/index');
			Yii::app()->getRequest()->redirect($url);
			return false;
		}
       
    }
}