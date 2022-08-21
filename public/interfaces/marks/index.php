<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<?php
  $subjects_data = [
    ['id_subject' => '1', 'subject_name' => 'Arabic'],
    ['id_subject' => '2', 'subject_name' => 'French'],
    ['id_subject' => '3', 'subject_name' => 'English'],
    ['id_subject' => '4', 'subject_name' => 'Mathematics'],
  ];
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
  ];


  $ar_teachers=[];
  $fr_teachers=[];
  $en_teachers=[];
  $math_teachers=[];

  foreach($teachers_data as $teacher){
    if($teacher['subjects'][0] == 'Arabic' || $teacher['subjects'][1] == 'Arabic'){
      array_push($ar_teachers, $teacher['id_teacher'].','.$teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'French' || $teacher['subjects'][1] == 'French'){
      array_push($fr_teachers, $teacher['id_teacher'].','.$teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'English' || $teacher['subjects'][1] == 'English'){
      array_push($en_teachers, $teacher['id_teacher'].','.$teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'Mathematics' || $teacher['subjects'][1] == 'Mathematics'){
      array_push($math_teachers, $teacher['id_teacher'].','.$teacher['first_name'].' '. $teacher['last_name']) ;
    }
  }
  $subjects_data[0]['teachers'] = $ar_teachers;
  $subjects_data[1]['teachers'] = $fr_teachers;
  $subjects_data[2]['teachers'] = $en_teachers;
  $subjects_data[3]['teachers'] = $math_teachers;
?>
<div class="content">
    <h1>Marks</h1>

<a href="<?php echo url_for('/interfaces/marks/show_all_marks.php?viewmarks=true') ?>">View All Students Marks</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Subject ID</th>
      <th scope="col">Subject Name</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($subjects_data as $subject ) { ?>
        <tr>
        <th scope="row"><?php echo $subject['id_subject'] ?></th>
        <td><?php echo $subject['subject_name']?></td>

        <td scope="col"><a href="<?php echo url_for('/interfaces/marks/show.php?id='.$subject['id_subject'].'&subject_name='.$subject['subject_name']. '&teachers='.urlencode($subject['teachers'][0].', '.$subject['teachers'][1])) ?>">View Marks</a></td>

        <td scope="col"><a href="#">Edit</a></td>
        <td scope="col"><a href="#">Delete</a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>


</div>
<?php include(SHARED_PATH .'/footer.php') ?>