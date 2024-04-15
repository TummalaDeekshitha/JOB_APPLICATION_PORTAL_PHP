<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Signup</title>
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

        .image-container {
            flex: 1;
            /* Take up remaining space */
            height: 70vh;
            /* 70% of viewport height */
            width: 40%;
            /* 40% of viewport width */
            max-width: 40%;
            /* Ensure it doesn't exceed 40% of the viewport width */
            overflow: hidden;
            /* Ensure the image doesn't overflow its container */
            display: flex;
            /* Use flexbox to center the image */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            padding: 5px;
            /* Add padding around the image */
        }

        .image-container img {
            max-width: 100%;
            /* Make the image fill its container */
            height: auto;
            /* Maintain aspect ratio */
        }


        .container {
            background: #fff;
            max-width: 800px;
            padding: 20px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
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
            display: inline-block;
            width: 150px;
            text-align: left;
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: calc(100% - 160px);
            padding: 8px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            font-size: 16px;
            cursor: pointer;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-container">
                <div class="form-container">
                    <h2>Signup Form</h2>
                    <span style="text-align: left;">
                        <?php $form = $this->beginWidget(
                            'CActiveForm',
                            array(
                                'id' => 'employee-form',
                                'action' => Yii::app()->createUrl('/myproject/employee/Signup'),
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                                'htmlOptions' => array(
                                    'enctype' => 'multipart/form-data',
                                )
                            )
                        ); ?>
                        <?php if ($message): ?>
                            <p class="custom-message"
                                style="font-weight: bold; color: #dc3545; font-size: 1.2em; margin-top: 10px;">
                                <?= $message ?>
                            </p>
                        <?php endif; ?>
                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, '', array('class' => 'form-label')); ?>
                            <?php echo $form->textField($model, 'name', array('placeholder' => 'Full Name', 'class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <!-- <?php //echo $form->labelEx($model, 'companyName', array('class' => 'form-label'));     ?> -->
                            <?php echo $form->textField($model, 'companyName', array('placeholder' => 'Company Name', 'class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <!-- <?php //echo $form->labelEx($model, 'email', array('class' => 'form-label'));     ?> -->
                            <?php echo $form->textField($model, 'email', array('placeholder' => 'Email', 'class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <!-- <?php //echo $form->labelEx($model, 'password', array('class' => 'form-label'));     ?> -->
                            <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Password', 'class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <!-- <?php //echo $form->labelEx($model, 'industry', array('class' => 'form-label'));     ?> -->
                            <?php echo $form->dropDownList($model, 'industry', array('software' => 'Software', 'core' => 'Core'), array('class' => 'form-control', 'prompt' => 'Select industry')); ?>
                        </div>

                        <div class="form-group">
                            <!-- <?php //echo $form->labelEx($model, 'employeeId', array('class' => 'form-label'));     ?> -->
                            <?php echo $form->textField($model, 'employeeId', array('placeholder' => 'Employee ID', 'class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'profile', array('class' => 'form-label')); ?>
                            <?php echo $form->fileField($model, 'profile', array('placeholder' => 'Profile Picture', 'class' => 'form-control', 'accept' => 'image/*')); ?>
                        </div>

                        <div class="row justify-content-end">
                            <?php echo CHtml::submitButton('Sign Up', array('id' => 'add-submit', 'class' => 'btn btn-primary btn-sm')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                        <?php if (!$message): ?>
                            <p>Already have an account? <a href="/myproject/employee/signin">Sign In</a></p>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="image-container">
        <!-- Your image goes here -->
        <img src="data:image/png;base64,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"
            alt="Your Image">
    </div>
</body>

</html>