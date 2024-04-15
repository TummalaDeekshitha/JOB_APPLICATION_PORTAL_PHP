<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">



    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->

    <!-- Bootstrap CSS -->

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
                <!-- Sign In Form -->
                <div class="form-container ">
                    <h2>Signin Form</h2>
                    <span style="text-align: left;">
                        <!-- Display custom message if provided -->
                        <?php if ($message): ?>
                            <p class="custom-message"
                                style="font-weight: bold; color: #dc3545; font-size: 1.2em; margin-top: 10px;">
                                <?= $message ?>
                            </p>
                        <?php endif; ?>

                        <?php $form = $this->beginWidget('CActiveForm', array(

                            'id' => 'signin-form',
                            'enableClientValidation' => true,
                            'action' => Yii::app()->createUrl('/myproject/employee/Signin'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        )
                        ); ?>
                        <div class="social-container">

                            <a href="http://demo.darwinboxlocal.com/index.php/myproject/signinform/googlelogin"
                                class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="http://demo.darwinboxlocal.com/index.php/myproject/signinform/linkedinlogin"
                                class="social"><i class="fab fa-linkedin-in"></i></a>

                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'email', array('class' => 'form-label')); ?>
                            <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'password', array('class' => 'form-label')); ?>
                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::submitButton('Sign in', array('class' => 'btn btn-primary m-3')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                        <div class="forgot-link">
                            <p class="text-center">Forgot password..? <a
                                    href="<?php echo Yii::app()->createUrl('/myproject/signinform/forgotpassword'); ?>">Reset
                                    password</a></p>
                        </div>
                        <div class="signup-link">
                            <p class="text-center">Don't have an account..? <a
                                    href="<?php echo Yii::app()->createUrl('/myproject/employee/signup'); ?>">Sign
                                    up</a></p>
                        </div>
                    </span>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>