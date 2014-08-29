<?php

class UserIdentity extends CUserIdentity {

    private $id;

    public function authenticate() {
        $record = User::model()
                ->findByAttributes(array('username' => $this->username));
        if ($record === null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } elseif ($record->password !== crypt($this->password, $record->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->id = $record->id;

            // add more states to access them from Yii::app()->user->___
            $this->setState('username', $record->username);
            
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->id;
    }
}