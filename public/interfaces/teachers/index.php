<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<?php
  $teachers_data = [
    ['id_teacher' => '1', 'first_name' => 'Mahoumd', 'last_name' => 'El Megri', 'gender' => 'M','date_of_birth' => '10/02/1985', 'subjects' => ['French','Mathematics']],
    ['id_teacher' => '2', 'first_name' => 'Farok', 'last_name' => 'Marjor', 'gender' => 'M','date_of_birth' => '04/01/1971', 'subjects' => ['Arabic','Mathematics']],
    ['id_teacher' => '3', 'first_name' => 'Lamiae', 'last_name' => 'Hassani', 'gender' => 'F','date_of_birth' => '06/05/1970', 'subjects' => ['English', 'Arabic']],
    ['id_teacher' => '4', 'first_name' => 'Fatima Zahra', 'last_name' => 'Bakali', 'gender' => 'F','date_of_birth' => '06/05/1980', 'subjects' => ['French','English']],
  ];
?>
<?php if($_SERVER['REQUEST_METHOD']=='POST') {
        if(isset($_GET['edit'])){
            $id_teacher = (int) ($_POST['id']);
            $new_first_name = isset($_POST['first_name'])? $_POST['first_name'] : '';
            $new_last_name = isset($_POST['last_name'])? $_POST['last_name'] : '';
            $new_gender = isset($_POST['gender'])? $_POST['gender'] : '';
            $new_date_of_birth = isset($_POST['date_of_birth'])? $_POST['date_of_birth'] : '';
            $new_subjectfirst = isset($_POST['subjectfirst'])? $_POST['subjectfirst']: '';
            $new_subjectsecond = isset($_POST['subjectsecond'])? $_POST['subjectsecond']: '';

            $teachers_data[$id_teacher - 1]['first_name'] = $new_first_name;
            $teachers_data[$id_teacher - 1]['last_name'] = $new_last_name;
            $teachers_data[$id_teacher - 1]['gender'] = $new_gender;
            $teachers_data[$id_teacher - 1]['date_of_birth'] = $new_date_of_birth;
            if($new_subjectfirst != ''){
              $teachers_data[$id_teacher - 1]['subjects'][0] =  $new_subjectfirst;
            }
            if($new_subjectsecond != ''){
              $teachers_data[$id_teacher - 1]['subjects'][1] =  $new_subjectsecond;
            }
        }elseif(isset($_GET['create'])){
            $id_teacher = (int) ($_POST['id']);
            $new_first_name = isset($_POST['first_name'])? $_POST['first_name'] : '';
            $new_last_name = isset($_POST['last_name'])? $_POST['last_name'] : '';
            $new_gender = isset($_POST['gender'])? $_POST['gender'] : '';
            $new_date_of_birth = isset($_POST['date_of_birth'])? $_POST['date_of_birth'] : '';
            $new_subjectfirst = isset($_POST['subjectfirst'])? $_POST['subjectfirst']: '';
            $new_subjectsecond = isset($_POST['subjectsecond'])? $_POST['subjectsecond']: '';

            $teachers_data[$id_teacher - 1] = ['id_teacher' => $id_teacher, 'first_name' => $new_first_name, 'last_name' => $new_last_name, 'gender' => $new_gender,'date_of_birth' => $new_date_of_birth, 'subjects' => [$new_subjectfirst,$new_subjectsecond]];
        }
    }
    if(isset($_GET['delete'])){
        $id_to_delete = (int) $_GET['id'];
        unset($teachers_data[$id_to_delete - 1]);

    }

    $freeId = (integer) end($teachers_data)['id_teacher'] + 1;
    ?>

<div class="content">
    <h1>Teachers</h1>
    <a href="<?php echo url_for('/interfaces/teachers/create.php?freeId='.$freeId) ?>">Create New</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Teacher ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($teachers_data as $teacher ) { ?>
        <tr>
        <th scope="row"><?php echo $teacher['id_teacher'] ?></th>
        <td><?php echo $teacher['first_name']?></td>
        <td><?php echo $teacher['last_name'] ?></td>
        <td><?php echo $teacher['gender']  == 'M'? 'Male': 'female' ?></td>
        <td scope="col"><a href="<?php echo url_for('/interfaces/teachers/show.php?id_teacher='.$teacher['id_teacher'].'&first_name='.$teacher['first_name'].'&last_name='.$teacher['last_name'].'&gender='.$teacher['gender'].'&date_of_birth='.$teacher['date_of_birth'].'&subjectfirst='.$teacher['subjects'][0].'&subjectsecond='.$teacher['subjects'][1]) ?>">View</a></td>

        <td scope="col"><a href="<?php echo url_for('/interfaces/teachers/edit.php?id_teacher='.$teacher['id_teacher'].'&first_name='.$teacher['first_name'].'&last_name='.$teacher['last_name'].'&gender='.$teacher['gender'].'&date_of_birth='.$teacher['date_of_birth'].'&subjectfirst='.$teacher['subjects'][0].'&subjectsecond='.$teacher['subjects'][1]) ?>">Edit</a></td>

        <td scope="col"><a href="<?php echo url_for('/interfaces/teachers/index.php?id='.$teacher['id_teacher'].'&delete=true') ?>">Delete</a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>


</div>
<?php include(SHARED_PATH .'/footer.php') ?>