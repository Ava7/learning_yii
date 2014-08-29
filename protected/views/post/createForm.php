<?php

return array(
    'title' => 'Apparently this is my title',
    
    'action' => Yii::app()->createUrl('post/store'),

    'elements' => array(
        'email' => array(
            'type' => 'text',
            'maxLength' => 32,
        ),
        'website' => array(
            'type' => 'text',
            'maxLength' => 128
        ),
        'message' => array(
            'type' => 'textarea',
            'maxLength' => 255
        )
    ),

    'buttons' => array(
        'submit' => array(
            'type' => 'submit',
            'label' => 'Submit'
        )
    )
);