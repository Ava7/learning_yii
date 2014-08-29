<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo isset($this->page_title) ? $this->page_title : 'No title definted :(' ?></title>
</head>
<body>
<header><!-- Header goes here -->
<nav>
<?php if (!Yii::app()->user->isGuest) : ?>
    <ul>
        <li><?php echo CHtml::link('начало', array('/')); ?></li>
        <li><?php echo CHtml::link('записи', array('/post')); ?>
        <ul>
            <li><?php echo CHtml::link('нов запис', array('/post/create')); ?></li>
        </ul>
        </li>
    </ul>
<?php endif; ?>
</nav>
</header>

<div id="content"><?php echo $content ?></div>

<footer><!-- Footer goes here --></footer>
</body>
</html>