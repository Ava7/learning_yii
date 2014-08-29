<?php

class WebUser extends CWebUser {

    private $model;

    public function getUsername() {
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->username;
    }

    // Load user model.
    protected function loadUser($id = null) {
        if ($this->model === null) {
            if ($id !== null) {
                $this->model = User::model()->findByPk($id);
            }
        }
        return $this->model;
    }

}