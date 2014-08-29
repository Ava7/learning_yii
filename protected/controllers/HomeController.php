<?php

class HomeController extends CController {

    public $page_title;

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('deny', 
                'actions' => array('index', 'logout'),
                'users' => array('?')
            ),
            array('allow',
                'actions' => array('login'),
                'users' => array('?')
            ),
            array('deny', 
                'actions' => array('login'),
                'users' => array('@')
            ),
        );
    }

    public function actionIndex() {
        // $user = new User();
        // $user->username = 'demo';
        // $user->password = crypt('demo');
        // $user->save();

        $this->page_title = 'Начало';

        $data = array(
            'welcome' => 'Добре дошли в това тестово приложение с Yii framework.',
        );

        return $this->render('index', $data);
    }

    public function actionLogin() {
        //Yii::app()->user->logout();

        $this->page_title = 'вход в системата';

        $model = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            // Repopulates fields
            $model->attributes = $_POST['LoginForm'];

            // Login validation
            if ($model->validate()) {
                echo 'SUXXESS';

                $username = $_POST['LoginForm']['username'];
                $password = $_POST['LoginForm']['password'];

                $identity = new UserIdentity($username, $password);
                if ($identity->authenticate()) {
                    Yii::app()->user->login($identity);
                    $this->redirect(Yii::app()->user->returnUrl);
                    //var_dump(Yii::app()->user->username);
                } else {
                    echo $identity->errorMessage();
                }
            } else {
                $my_data['errors'] = $model->getErrors();
            }
        }

        $my_data['model'] = $model;
        
        return $this->render('login', $my_data);
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }

}