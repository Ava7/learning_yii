<p>Login page</p>

<p>
<?php
echo 'Am I a guest? ', var_dump(Yii::app()->user->isGuest); 
?>
</p>

<?php

$form = $this->beginWidget('CActiveForm', array(
        'id' => 'login_form',
        'action' => ''
    )
);

echo $form->label($model, 'потребител');
echo $form->textField($model, 'username');

if (isset($errors['username'])) {
    foreach ($errors['username'] as $error) {
        echo '<p>' . $error . '</p>';
    }
}

echo $form->label($model, 'парола');
echo $form->textField($model, 'password');

if (isset($errors['password'])) {
    foreach ($errors['password'] as $error) {
        echo '<p>' . $error . '</p>';
    }
}

echo $form->checkBox($model,'rememberMe');
echo $form->label($model,'rememberMe');

echo CHtml::submitButton('Login');

$this->endWidget();