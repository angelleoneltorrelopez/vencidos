
<div class="container">
	<div class="row">
        <div class="col-md-6 col-md-offset-3">


<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
	'focus'=>array($model,'username'),
	'htmlOptions' => array('class'=>'','style'=>' max-width: 330px;
padding: 15px;
margin: 0 auto;'),
)); ?>
<div class="row">
			<div class="col-md-6 col-md-offset-3">
<h1><b>Login</b></h1>
</div>
</div>
	<div class="row">
		<?php echo $form->textFieldGroup($model,'username',array('label'=>'','widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'Usuario','maxlength'=>10)))); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordFieldGroup($model,'password',array('label'=>'','widgetOptions'=>array('htmlOptions'=>array('placeholder'=>'Password','maxlength'=>15)))); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkboxGroup($model,'rememberMe',array('label'=>'Recordarme')); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'Login',
				'size'=>'large',
			)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
    </div>
