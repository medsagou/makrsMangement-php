<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>

<?php
$id = isset($_GET['id_teacher'])? $_GET['id_teacher'] : '';
$first_name = isset($_GET['first_name'])? $_GET['first_name'] : '';
$last_name = isset($_GET['last_name'])? $_GET['last_name'] : '';
$gender = isset($_GET['gender'])? $_GET['gender'] : '';
$date_of_birth = isset($_GET['date_of_birth'])? $_GET['date_of_birth'] : '';
$first_subject = isset($_GET['subjectfirst'])? $_GET['subjectfirst'] : '' ;
$second_subject = isset($_GET['subjectsecond'])? $_GET['subjectsecond'] : '' ;
?>

<?php   $marks_data = [
    ['student_id' => '1', 'first_name' => 'Mohamed', 'last_name' => 'Sagou', 'gender' => 'M','date_of_birth' => '10/01/2002', 'marks'=>['Arabic'=>[7,2],'English'=> [8,3], 'French' => [5,1], 'Mathematics'=> [3,2]]],
    ['student_id' => '2', 'first_name' => 'Zakaria', 'last_name' => 'Samori', 'gender' => 'M','date_of_birth' => '10/03/2001', 'marks'=>['Arabic'=> [4,3] ,'English'=> [8,4], 'French' => [5,4], 'Mathematics'=> [4, 1]]],
    ['student_id' => '3', 'first_name' => 'Fatiha', 'last_name' => 'Nahri', 'gender' => 'F','date_of_birth' => '10/08/2000', 'marks'=>['Arabic'=> [10,2], 'English'=> [8,3], 'French' => [5,1], 'Mathematics'=> [9,2]]],
    ['student_id' => '4', 'first_name' => 'Fatima', 'last_name' => 'Mouiden', 'gender' => 'F','date_of_birth' => '04/11/1999', 'marks'=>['Arabic'=> [6,3] ,'English'=> [9,4], 'French' => [10,4], 'Mathematics'=> [8, 1]]],
  ];
   ?>

<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $teacher_id = isset($_GET['teacher_id'])? $_GET['teacher_id']: '';
    $student_to_show = [];
    foreach($marks_data as $student){
        foreach($student['marks'] as $subject => $marks_teacher_id){
            if($marks_teacher_id[1] == $teacher_id){
                array_push($student_to_show, $student['student_id'].', '.$subject.': '.$marks_teacher_id[0]);
            }
        }
    }
    $container =[];
    foreach($student_to_show as $student){
        $student_show_array = [];
        $student_array = explode(", ", $student);
        $student_show_array['student_id'] = $student_array[0];
        $student_show_array['marks'] =  $student_array[1];
        array_push($container, $student_show_array);
    }


    $no_repeat_container = [];
    foreach($container as $student_thing){
        $student_thing['student_id'];
        if(array_key_exists($student_thing['student_id'], $no_repeat_container)){
            $no_repeat_container[$student_thing['student_id']] = $no_repeat_container[$student_thing['student_id']] .', '.  $student_thing['marks'];
        }else{
            $no_repeat_container[$student_thing['student_id']] = $student_thing['marks'];
        }
    }

    // foreach ($no_repeat_container as $id => $marks){
    //     echo 'Student Id: '.$id.'<br>Full Name: '.$marks_data[(int) $id - 1]['first_name'].' '.$marks_data[(int) $id - 1]['last_name'].'<br>'.'Subjects Marks: '.$marks.'<br><br>';
    // }

    // foreach($container as $student){
    //     echo 'Student Id: '.$student['student_id'].'<br>Full Name: '.$marks_data[(int) $student['student_id'] - 1]['first_name'].' '.$marks_data[(int) $student['student_id'] - 1]['last_name'].'<br>'.'Subjects Marks: '.$student['marks'].'<br><br>';
    // }
} ?>
<div class="display-detail">
<?php
    echo 'Teacher Id : '.$id.'<br>';
    echo 'Frist Name : '.$first_name.'<br>';
    echo 'Last Name : '.$last_name.'<br>';
    echo 'gender : '.$gender.'<br>';
    echo 'Date of birth : '.$date_of_birth.'<br>';
    echo 'Subjects : '.$first_subject.', '. $second_subject.'<br>';
    echo '<br><a href="'.url_for('/interfaces/teachers/show.php?id_teacher='.$id.'&first_name='.$first_name.'&last_name='.$last_name.'&gender='.$gender.'&date_of_birth='.$date_of_birth.'&subjectfirst='.$first_subject.'&subjectsecond='.$second_subject).'&teacher_id='.$id.'">Students marks >></a>'; // to marks pages
    ?>
</div>
<?php foreach ($no_repeat_container as $id => $marks){
        echo 'Student Id: '.$id.'<br>Full Name: '.$marks_data[(int) $id - 1]['first_name'].' '.$marks_data[(int) $id - 1]['last_name'].'<br>'.'Subjects Marks: '.$marks.'<br><br>';
    } ?>

    <br>
    <br>
<a href="<?php echo url_for('./interfaces/teachers/index.php') ?>"><< Back</a>
<br>
<?php include(SHARED_PATH .'/footer.php') ?>