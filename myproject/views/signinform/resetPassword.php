

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Image -->
                <img src="/images/signupact.jpeg" alt="Signup Image" class="img-fluid">
            </div>
            <div class="col-md-6 form-container">
                <!-- Sign In Form -->
                <div class="form-container ">
                    <h2>Reset Your Password</h2>
                    <span  style="text-align: left;" >
                    <!-- Display custom message if provided -->
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        
                        'id' => 'Password-Reset-form',
                        'enableClientValidation' => true,
                        'action' => Yii::app()->createUrl('/myproject/signinform/resetpassword'),
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    )); ?>

<div class="form-container sign-in-container">
		<!-- <form action="#"> -->
			<div class="row">
    <?php echo $form->labelEx($model, 'newPassword', ); ?>
    <?php echo $form->passwordField($model, 'newPassword',array('class' => 'input')); ?>
    <?php echo $form->error($model, 'newPassword', ); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'confirmPassword', ); ?>
    <?php echo $form->passwordField($model, 'confirmPassword',array('class' => 'input')); ?>
    <?php echo $form->error($model, 'confirmPassword', ); ?>
</div>



<div class="row">
<br> <br>
    <?php echo CHtml::submitButton('Reset', array('class' => 'btn btn-primary button')); ?>
</div>
	<!-- </form> -->
	</div>

	
</div>
<?php $this->endWidget(); ?>
                    </span>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

