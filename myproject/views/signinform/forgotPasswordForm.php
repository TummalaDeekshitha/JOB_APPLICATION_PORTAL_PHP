

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Image -->
                <img src="/images/signupact.jpeg" alt="Signup Image" class="img-fluid">
            </div>
            <div class="col-md-6 form-container">
                <!-- Sign In Form -->
                <div class="form-container ">
                    <h2>Forgot Password</h2>
                    <span  style="text-align: left;" >
                    <!-- Display custom message if provided -->
                    <?php if(isset($message)): ?>
                        <p class="custom-message"><?= $message ?></p>
                    <?php endif; ?>
                    <?php $form = $this->beginWidget('CActiveForm', array(
                        
                        'id' => 'signin-form',
                        'enableClientValidation' => true,
                        'action' => Yii::app()->createUrl('/myproject/signinform/forgotpasswordsubmit'),
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    )); ?>
                     

                    <div class="mb-3">
                            <?php echo $form->labelEx($model, 'email', array('class' => 'form-label')); ?>
                            <?php echo $form->emailField($model, 'email', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
                        </div>

                        <div class="text-center">
                            <?php echo CHtml::submitButton('Send OTP', array('class' => 'btn btn-primary')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                  
                    </span>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
