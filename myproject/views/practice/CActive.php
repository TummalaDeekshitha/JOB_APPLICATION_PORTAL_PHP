<div><h1>SigupForm<h1>
    <?php $form=$this->beginWidget("CActiveForm",array(
        "id"=>"practiceform",
        "action"=>Yii::app()->createUrl("/myproject/practice/formSubmit"),
        "enableClientValidation"=>true,
        "clientOptions"=>array(
            "validationOnSubmit"=>true
        ),
        "htmlOptions"=>array("enctype"=>"multipart/form-data")
        

    ));
    ?>
    <div class="form-group">
        <?php echo $form->labelEx($model,"name",array("class"=>"form-label")) ?>
        <?php echo $form->TextField($model,"name",array("class"=>"form-control","placeholder"=>"enter Name")) ?>
        <?php echo $form->error($model,"name",array("class"=>"text-danger"))?>


    </div>
    <div class="form-group">
        <?php  echo $form->labelEx($model,"password",array("class"=>"form-label")) ?>
        <?php echo $form->PasswordField($model,"password",array("class"=>"form-control")) ?>
        <?php echo $form->error($model,"password") ?>
    </div>
    <?php 
    $modelEmbedded=new PracticeArrayEmbedded();
    ?>
    <div class="form-group">
        <?php  echo $form->labelEx($modelEmbedded,"[0]shift",array("class"=>"form-label")) ?>
        <?php echo $form->DropDownList($modelEmbedded,"[0]shift",array("morning"=>"morning","evening"=>"evening" ),array("class"=>"form-control")) ?>
        <?php echo $form->error($modelEmbedded,"[0]shift") ?>
    </div>
    <div class="form-group">
        <?php  echo $form->labelEx($modelEmbedded,"[0]companyName",array("class"=>"form-label")) ?>
        <?php echo $form->TextField($modelEmbedded,"[0]companyName",array("class"=>"form-control")) ?>
        <?php echo $form->error($modelEmbedded,"[0]companyName") ?>
    </div>
    <div class="form-group">
        <?php  echo $form->labelEx($model,"logo",array("class"=>"form-label")) ?>
        <?php echo $form->FileField($model,"logo",array("class"=>"form-control")) ?>
        <?php echo $form->error($model,"logo") ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton("submit",array("class"=>"btn btn-primary")) ?>
    </div>
<?php $this->endWidget() ?>
</div>