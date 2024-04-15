

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

