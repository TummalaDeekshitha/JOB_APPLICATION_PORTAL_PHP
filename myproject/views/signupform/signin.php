

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
                    <span  style="text-align: left;" >
                    <!-- Display custom message if provided -->
                    <?php if(isset($message)): ?>
                        <p class="custom-message"><?= $message ?></p>
                    <?php endif; ?>
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        
                        'id' => 'signin-form',
                        'enableClientValidation' => true,
                        'action' => Yii::app()->createUrl('/myproject/signinform/signin'),
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    )); ?>
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
                        <?php echo CHtml::submitButton('Sign in', array('class' => 'btn btn-primary m-3')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                    <div class="forgot-link">
                        <p class="text-center">Forgot password..? <a href="<?php echo Yii::app()->createUrl('/myproject/signinform/forgotpassword'); ?>">Reset password</a></p>
                    </div>
                    <div class="signup-link">
                        <p class="text-center">Don't have an account..? <a href="<?php echo Yii::app()->createUrl('/myproject/signupform'); ?>">Sign up</a></p>
                    </div>
                    </span>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

