<?php
use Aws\S3\S3Client;
 
class S3Helper{
    public function __construct()
    {
        $this->objAwsS3Client = new S3Client(
            [
                'version' => 'latest',
                'region' => "ap-south-1",//$_ENV['AWS_ACCESS_REGION'],
                'credentials' => [
                    'key'    => $_ENV['awsbkey'],
                    'secret' => $_ENV['awsbskey']
                ]
            ]
        );
    }

    public function upload($tempFilePath, $contentType = null) {
        $fileNameCmps = explode(".", $tempFilePath);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $tempFilePath) . '.' . $fileExtension;
        
        $params = [
            'Bucket' => $_ENV['AWS_BUCKET_NAME'],
            'Key'    => $newFileName,
            'Body'   => fopen($tempFilePath, 'r'),
            'ContentType' => $contentType // Specify the content type (MIME type) of the file
        ];

        $this->objAwsS3Client->putObject($params);

        $url = $this->objAwsS3Client->getObjectUrl($_ENV['AWS_BUCKET_NAME'], $newFileName);
        return $url;
    }
    
}