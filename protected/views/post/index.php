<?php

if (count($posts)) {
    foreach ($posts as $post) {
        echo '<p>';
        echo CHtml::link('delete', array('post/delete/' . $post['id']),
            array('onclick' => 'return confirm("You serious, mate?!");')
            );
        echo ' | запис № ' . $post['id'] . ': ';
        echo '<span>';
        echo $post['message'];
        echo '</span>';
        echo '</p>';
    }
}

$this->widget('CLinkPager', array(
    'pages' => $pages,
));
