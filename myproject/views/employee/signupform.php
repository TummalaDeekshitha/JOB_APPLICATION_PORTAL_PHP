<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(-60deg, #ff5858 0%, #f09819 100%);
        }

        .container {
            background: #fff;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container {
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #messageContainer {
            color: #dc3545;
            margin-bottom: 10px;
        }

        /* Ensure the image fills the entire column */
        .img-fluid {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Image -->
                <img src="/images/signupact.jpeg" alt="Signup Image" class="img-fluid">
            </div>
            <div class="col-md-6 form-container">
            <div class="form-container">
                    <h2>Signup Form</h2>
                    <span  style="text-align: left;" >
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'signup-form',
                        'action' => Yii::app()->createUrl('/myproject/signupform/signup'), // Specify the action here
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    )); ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'name',array('class' => 'form-label')); ?>
                        <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'email',array('class' => 'form-label')); ?>
                        <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'password',array('class' => 'form-label')); ?>
                        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('Sign up', array('class' => 'btn btn-primary m-3')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                    <p>Already have an account? <a href="/myproject/signinform">Sign In</a></p>

                    <?php if(isset($message)): ?>
                        <p class="custom-message"><?= $message ?></p>
                    <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
