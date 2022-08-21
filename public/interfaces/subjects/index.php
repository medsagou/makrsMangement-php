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


  $ar_teachers=[];
  $fr_teachers=[];
  $en_teachers=[];
  $math_teachers=[];

  foreach($teachers_data as $teacher){
    if($teacher['subjects'][0] == 'Arabic' || $teacher['subjects'][1] == 'Arabic'){
      array_push($ar_teachers,$teacher['id_teacher'] .','. $teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'French' || $teacher['subjects'][1] == 'French'){
      array_push($fr_teachers,$teacher['id_teacher'] .','. $teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'English' || $teacher['subjects'][1] == 'English'){
      array_push($en_teachers,$teacher['id_teacher'] .','. $teacher['first_name'].' '. $teacher['last_name']);
    }
    if($teacher['subjects'][0] == 'Mathematics' || $teacher['subjects'][1] == 'Mathematics'){
      array_push($math_teachers,$teacher['id_teacher'] .','. $teacher['first_name'].' '. $teacher['last_name']) ;
    }
  }
  $subjects_data[0]['teachers'] = $ar_teachers;
  $subjects_data[1]['teachers'] = $fr_teachers;
  $subjects_data[2]['teachers'] = $en_teachers;
  $subjects_data[3]['teachers'] = $math_teachers;
?>
<div class="content">
    <h1>Subjects</h1>
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

        <td scope="col"><a href="<?php echo url_for('/interfaces/subjects/show.php?id='.$subject['id_subject'].'&subject_name='.$subject['subject_name']. '&teachers='.urlencode($subject['teachers'][0].', '.$subject['teachers'][1])) ?>">View</a></td>

        <td scope="col"><a href="#">Edit</a></td>
        <td scope="col"><a href="#">Delete</a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>


</div>
<?php include(SHARED_PATH .'/footer.php') ?>