<?php

class LoginForm extends CFormModel {

    public $username;
    public $password;
    public $rememberMe = false;

    private $identity;

    public function rules() {
        return array(
            array('username, password', 'required'),
            array('username', 'length', 'min' => 3, 'max' => 32),
            array('password', 'authenticate', 'on' => 'login'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate')
        );
    }

    public function authenticate() {
        $this->identity = new UserIdentity($this->username, $this->password);
        if (!$this->identity->authenticate()) {
            $this->addError('password', 'Името или паролата не съвпадат!');
        }
    }

    public function attributeLabels()
    {
        return array(
            'verifyCode' => 'Verification Code',
        );
    }

}