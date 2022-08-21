<?php require_once('../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<div class="content">
    <ul class="main-menu">
        <li><a href="<?php echo url_for('/interfaces/students') ?>">Students</a></li>
        <li><a href="<?php echo url_for('/interfaces/teachers/index.php') ?>">Teachers</a></li>
        <li><a href="<?php echo url_for('/interfaces/marks/index.php') ?>">Marks</a></li>
        <li><a href="<?php echo url_for('/interfaces/subjects/index.php') ?>">Subjects</a></li>
    </ul>
</div>
<?php include(SHARED_PATH .'/footer.php') ?>