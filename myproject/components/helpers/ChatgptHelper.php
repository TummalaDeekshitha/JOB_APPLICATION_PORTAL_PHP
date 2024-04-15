<?php
class ChatgptHelper extends CComponent {


    public static function getChat($conversation)
  {
    // Set the endpoint
    $url = "https://api.openai.com/v1/chat/completions";
 
    // Set the method
    $method = "POST";
    $user=Yii::app()->user->getState("username");

    // GPT Prompt
    $prompt = "You are the AI model you should give answers to the querie  by keeping previous conversation in the context  and you should act like chat bot and give info to users so you are acting like chatbot in the jobapplication portal (JOB FORGE) on that give the answer  based on initally user name is $user.give ns to to last question in the conversation our conversation $conversation ";
 
    // Set the parameters
    $parameters = array(
      "model" => "gpt-3.5-turbo",
      "messages" => array(
        array("role" => "system", "content" => $prompt),
      )
    );
 
    // Get the Bearer Token
    $authorization_token = "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";
    // Set the Content Type
    $content_type = "application/json";
 
    $result = CurlHelper::curl($url, $method, $parameters, $authorization_token, [], $content_type);
    // return $result;
    return $result["choices"][0]["message"]["content"];
  }

}