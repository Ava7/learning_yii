<?php

class PostForm extends CFormModel {

    public $email;
    public $website;
    public $message;

    public function rules() {
        return array(
            array('email, message', 'required'),
            array('email', 'email'),
            array('website', 'url', 'allowEmpty' => true),
            array('message', 'length', 'min' => 2, 'max' => 255)
        );
    }

}