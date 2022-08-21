<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<?php

$show = false;
?>
<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['show'])){
        $show = true;
    }

    $teachers_data = [
        ['id_teacher' => '1', 'first_name' => 'Mahoumd', 'last_name' => 'El Megri', 'gender' => 'M','date_of_birth' => '10/02/1985', 'subjects' => ['French','Mathematics']],
        ['id_teacher' => '2', 'first_name' => 'Farok', 'last_name' => 'Marjor', 'gender' => 'M','date_of_birth' => '04/01/1971', 'subjects' => ['Arabic','Mathematics']],
        ['id_teacher' => '3', 'first_name' => 'Lamiae', 'last_name' => 'Hassani', 'gender' => 'F','date_of_birth' => '06/05/1970', 'subjects' => ['English', 'Arabic']],
        ['id_teacher' => '4', 'first_name' => 'Fatima Zahra', 'last_name' => 'Bakali', 'gender' => 'F','date_of_birth' => '06/05/1980', 'subjects' => ['French','English']],
      ];

    $marks_data = [
    ['student_id' => '1', 'first_name' => 'Mohamed', 'last_name' => 'Sagou', 'gender' => 'M','date_of_birth' => '10/01/2002', 'marks'=>['Arabic'=>[7,2],'English'=> [8,3], 'French' => [5,1], 'Mathematics'=> [3,2]]],
    ['student_id' => '2', 'first_name' => 'Zakaria', 'last_name' => 'Samori', 'gender' => 'M','date_of_birth' => '10/03/2001', 'marks'=>['Arabic'=> [4,3] ,'English'=> [8,4], 'French' => [5,4], 'Mathematics'=> [4, 1]]],
    ['student_id' => '3', 'first_name' => 'Fatiha', 'last_name' => 'Nahri', 'gender' => 'F','date_of_birth' => '10/08/2000', 'marks'=>['Arabic'=> [10,2], 'English'=> [8,3], 'French' => [5,1], 'Mathematics'=> [9,2]]],
    ['student_id' => '4', 'first_name' => 'Fatima', 'last_name' => 'Mouiden', 'gender' => 'F','date_of_birth' => '04/11/1999', 'marks'=>['Arabic'=> [6,3] ,'English'=> [9,4], 'French' => [10,4], 'Mathematics'=> [8, 1]]],
    ];}
?>
<?php
$id = isset($_GET['id'])? $_GET['id'] : '';
$first_name = isset($_GET['first_name'])? $_GET['first_name'] : '';
$last_name = isset($_GET['last_name'])? $_GET['last_name'] : '';
$gender = isset($_GET['gender'])? $_GET['gender'] : '';
$date_of_birth = isset($_GET['date_of_birth'])? $_GET['date_of_birth'] : '';
?>
<div class="display-detail">
<?php
    echo 'Id : '.$id.'<br>';
    echo 'Frist Name : '.$first_name.'<br>';
    echo 'Last Name : '.$last_name.'<br>';
    echo 'gender : '.$gender.'<br>';
    echo 'Date of birth : '.$date_of_birth.'<br>';
    echo '<a href="'.url_for('interfaces/students/show.php?id='.$id.'&first_name='.$first_name.'&last_name='.$last_name.'&gender='.$gender.'&date_of_birth='.$date_of_birth.'&show=true').'">marks >></a>'; // to marks pages
    ?>
</div>
<?php
if($show){
    echo 'Student Id: ' . $marks_data[$id - 1]['student_id'] .'<br>';
    echo 'Full Name: ' . $marks_data[$id - 1]['first_name'] . ' '.$marks_data[$id - 1]['last_name'].'<br>';
    echo 'Marks: <br>';
    foreach($marks_data[$id - 1]['marks'] as $subject => $marks_teacherid){
        echo '<ul><li>'.$subject.': '.$marks_teacherid[0].' / Teacher: '.$teachers_data[(int)$marks_teacherid[1] -1]['first_name'].' '.$teachers_data[(int)$marks_teacherid[1] -1]['last_name'].'</li></ul>';
    }
    echo '<hr>';
}
 ?>
<a href="<?php echo url_for('./interfaces/students/index.php') ?>"><< Back</a>
<br>
<?php include(SHARED_PATH .'/footer.php') ?>