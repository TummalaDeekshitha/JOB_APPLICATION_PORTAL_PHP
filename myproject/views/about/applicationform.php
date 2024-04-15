<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'application-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'action' => Yii::app()->createUrl('/myproject/about/applicationformsubmit'),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="container">
    <h1 class="text-center">Job Application Form</h1>
    
    <div class="mb-3">
        <?php echo $form->labelEx($model, 'name', ['class' => 'form-label']); ?>
        <?php echo $form->textField($model, 'name', ['class' => 'form-control']); ?>
        <?php echo $form->error($model, 'name', array('class' => 'text-danger')); ?>
    </div>
    
    <div class="mb-3">
        <?php echo $form->labelEx($model, 'email', ['class' => 'form-label']); ?>
        <?php echo $form->textField($model, 'email', ['class' => 'form-control']); ?>
        <?php echo $form->error($model, 'email', array('class' => 'text-danger')); ?>
    </div>
    
    <div class="mb-3">
        <?php echo $form->labelEx($model, 'phoneno', ['class' => 'form-label']); ?>
        <?php echo $form->textField($model, 'phoneno', ['class' => 'form-control']); ?>
        <?php echo $form->error($model, 'phoneno', array('class' => 'text-danger')); ?>
    </div>
    
    <div class="mb-3">
        <?php echo $form->labelEx($model, 'coverletter', ['class' => 'form-label']); ?>
        <?php echo $form->textArea($model, 'coverletter', ['class' => 'form-control']); ?>
        <?php echo $form->error($model, 'coverletter', array('class' => 'text-danger')); ?>
    </div>
    
    <div class="mb-3">
        <?php echo $form->labelEx($model, 'resume', ['class' => 'form-label']); ?>
        <?php echo $form->fileField($model, 'resume', ['class' => 'form-control']); ?>
        <?php echo $form->error($model, 'resume', array('class' => 'text-danger')); ?>
    </div>
    <script>

      console.log(  <?php echo($jobid) ?>);
    </script>
    <?php echo CHtml::hiddenField('job_id', $jobid); ?>
    <!-- <!?php echo CHtml::hiddenField('category', $category); ?>
    <!?php echo CHtml::hiddenField('jobname', $jobname); ?>
    <!?php echo CHtml::hiddenField('companyname', $companyname); ?> -->
    <div class="mb-3">
        <?php echo CHtml::submitButton('Submit Application', ['class' => 'btn btn-primary']); ?>
    </div>
</div>

<?php $this->endWidget(); ?>