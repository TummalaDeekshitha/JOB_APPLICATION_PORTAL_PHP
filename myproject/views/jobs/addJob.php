<?php use yii\helpers\Html; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Display</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: grey;
        }

        .form {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid black;
            border-radius: 10px;
            padding: 20px;
            background-color: skyblue;
        }

        .form label {
            font-weight: bold;
        }

        .form .row {
            margin-bottom: 15px;
        }

        .form .error {
            color: red;
            font-size: 12px;
        }

        .form .buttons {
            text-align: center;
        }

        .form .buttons button {
            width: 100px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .buttons button {
            width: 20%;
            /* Adjust button width */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2>Add new Job entry</h2>
            </div>
        </div>
    </div>

    <div class="form">
        <?php $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'employee-form',
                'action' => Yii::app()->createUrl('/myproject/jobs/AddJob'),
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                )
            )
        );
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'jobTitle'); ?>
                <?php echo $form->textField($model, 'jobTitle', array('class' => 'form-control', 'placeholder' => 'Enter Job Title', 'value' => isset($_POST['Jobs']['jobTitle']) ? $_POST['Jobs']['jobTitle'] : '')); ?>
                <?php echo isset($error['jobTitle']) ? '<span class="error">' . $error['jobTitle'][0] . '</span>' : ''; ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'totalApplications'); ?>
                <?php echo $form->numberField($model, 'totalApplications', array('class' => 'form-control', 'placeholder' => 'Enter Total Applications', 'value' => isset($_POST['Jobs']['totalApplications']) ? $_POST['Jobs']['totalApplications'] : '')); ?>
                <?php echo isset($error['totalApplications']) ? '<span class="error">' . $error['totalApplications'] . '</span>' : ''; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'openings'); ?>
                <?php echo $form->numberField($model, 'openings', array('class' => 'form-control', 'placeholder' => 'Enter Openings', 'value' => isset($_POST['Jobs']['openings']) ? $_POST['Jobs']['openings'] : '')); ?>
                <?php echo isset($error['openings']) ? '<span class="error">' . $error['openings'][0] . '</span>' : ''; ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'category'); ?>
                <?php echo $form->dropDownList($model, 'category', array(
                    'software' => 'Software',
                    'core' => 'Core',
                ), array('class' => 'form-control', 'prompt' => 'Select Category', 'value' => isset($_POST['Jobs']['category']) ? $_POST['Jobs']['category'] : '')); ?>
                <?php echo isset($error['category']) ? '<span class="error">' . $error['category'][0] . '</span>' : ''; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'lastDate'); ?>
                <?php $this->widget(
                    'zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model' => $model,
                        'attribute' => 'lastDate',
                        'options' => array(
                            'dateFormat' => 'yy-mm-dd', // Set the date format here
                            'minDate' => 0,
                            // You can add more options as needed
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => 60,
                            'maxlength' => 128,
                            'placeholder' => 'Select Last Date',
                            'value' => isset($_POST['Jobs']['lastDate']) ? $_POST['Jobs']['lastDate'] : ''
                        ),
                    )
                ); ?>
                <?php echo isset($error['lastDate']) ? '<span class="error">' . $error['lastDate'] . '</span>' : ''; ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->labelEx($model, 'logo'); ?>
                <?php echo $form->fileField($model, 'logo', array('id' => 'logo-input', 'class' => 'input-file form-control', 'accept' => 'image/*', 'value' => isset($_POST['Jobs']['logo']) ? $_POST['Jobs']['logo'] : '')); ?>
                <?php echo isset($error['logo']) ? '<span class="error">' . $error['logo'][0] . '</span>' : ''; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php echo $form->labelEx($model['details'], 'salary'); ?>
                <?php echo $form->numberField($model['details'], 'salary', array('class' => 'form-control', 'placeholder' => 'Enter Salary', 'value' => isset($_POST['Jobs']['details']['salary']) ? $_POST['Jobs']['details']['salary'] : '')); ?>
                <?php echo isset($error['salary']) ? '<span class="error">' . $error['salary'][0] . '</span>' : ''; ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->labelEx($model['details'], 'location'); ?>
                <?php echo $form->textField($model['details'], 'location', array('class' => 'form-control', 'placeholder' => 'Enter Location', 'size' => 60, 'maxlength' => 128, 'value' => isset($_POST['Jobs']['details']['location']) ? $_POST['Jobs']['details']['location'] : '')); ?>
                <?php echo isset($error['location']) ? '<span class="error">' . $error['location'][0] . '</span>' : ''; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php echo $form->labelEx($model['details'], 'description'); ?>
                <?php echo $form->textArea($model['details'], 'description', array('class' => 'form-control', 'placeholder' => 'Enter Description', 'rows' => 6, 'value' => isset($_POST['Jobs']['details']['description']) ? $_POST['Jobs']['details']['description'] : '')); ?>
                <?php echo isset($error['description']) ? '<span class="error">' . $error['description'][0] . '</span>' : ''; ?>
            </div>
        </div>

        <div class="row buttons">
            <div class="col-md-6">
                <?php echo CHtml::submitButton('Add', array('id' => 'add-submit', 'class' => 'btn btn-primary btn-block btn-sm')); ?>
            </div>
            <?php $this->endWidget(); ?>
            <a href="/myproject/jobs/Cancel" class="btn btn-secondary">Cancel</a>

        </div>

    </div><!-- form -->

    <script>
        document.getElementById('add-submit').addEventListener('click', function (event) {
            var logoInput = document.getElementById('logo-input');
            if (logoInput.files.length === 0) {
                event.preventDefault(); // Prevent form submission
                alert('Please upload a logo image.');
            }
        });

    </script>
</body>

</html>