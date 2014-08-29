<?php

class PostController extends CController {

    public $page_title;

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('deny', 
                'actions' => array('index'),
                'users' => array('?')
            ),
        );
    }

    public function actionIndex() {
        $this->page_title = '>> въведи име на страницата <<';

        $criteria = new CDbCriteria();
        $count = Post::model()->count();
        $pages = new CPagination($count);

        $pages->pageSize = 5;
        $pages->applyLimit($criteria);

        $posts = Post::model()->findAll($criteria);

        return $this->render('index', array('posts' => $posts,'pages' => $pages));

    }

    public function actionCreate() {
        $model = new PostForm();
        $form = new CForm('application.views.post.createForm', $model);

        return $this->render('create', array('form' => $form));
    }

    public function actionStore() {
        $model = new PostForm();
        $form = new CForm('application.views.post.createForm', $model);

        if ($form->submitted('submit') && $form->validate()) {

            $now = new DateTime('now');

            $post = new Post();
            $post->email = $_POST['PostForm']['email'];
            $post->website = $_POST['PostForm']['website'];
            $post->message = htmlspecialchars(strip_tags(trim($_POST['PostForm']['message'])));
            $post->created_at = $now->format('Y-m-d H:i:s');
            $post->save();

            if ($post->save()) {
                $this->redirect('index');
            } else {
                // data is invalid. call getErrors() to retrieve error messages
            }


        } else {
            // pass error messages through here!
            $this->redirect('create', array('form' => $form));
        }
    }

    public function actionDelete($id) {
        $id = (int) $id;

        $post = Post::model();
        $transaction = $post->dbConnection->beginTransaction();
        try {
            $post = Post::model()->findByPk($id);
            if ($post && $post->delete()) {
                $transaction->commit();
            } else {
                $transaction->rollback();
            }
        } catch (Exception $e) {
            $transaction->rollback();
            throw $e;
        }
        $this->redirect(array('post/index'));
    }

}