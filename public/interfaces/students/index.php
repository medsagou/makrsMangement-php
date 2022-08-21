<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<?php
  $students_data = [
    ['id' => '1', 'first_name' => 'Mohamed', 'last_name' => 'Sagou', 'gender' => 'M','date_of_birth' => '10/01/2002'],
    ['id' => '2', 'first_name' => 'Zakaria', 'last_name' => 'Samori', 'gender' => 'M','date_of_birth' => '10/03/2001'],
    ['id' => '3', 'first_name' => 'Fatiha', 'last_name' => 'Nahri', 'gender' => 'F','date_of_birth' => '10/08/2000'],
    ['id' => '4', 'first_name' => 'Fatima', 'last_name' => 'Mouiden', 'gender' => 'F','date_of_birth' => '04/11/1999'],
  ];
?>
<?php if($_SERVER['REQUEST_METHOD']=='POST') {
        if(isset($_GET['edit'])){
            $id = (int) ($_POST['id']);
            $new_first_name = isset($_POST['first_name'])? $_POST['first_name'] : '';
            $new_last_name = isset($_POST['last_name'])? $_POST['last_name'] : '';
            $new_gender = isset($_POST['gender'])? $_POST['gender'] : '';
            $new_date_of_birth = isset($_POST['date_of_birth'])? $_POST['date_of_birth'] : '';

            $students_data[$id - 1]['first_name']=$new_first_name;
            $students_data[$id - 1]['last_name']=$new_last_name;
            $students_data[$id - 1]['gender']=$new_gender;
            $students_data[$id - 1]['date_of_birth']=$new_date_of_birth;
        }elseif(isset($_GET['create'])){
            $id = (int) ($_POST['id']);
            $new_first_name = isset($_POST['first_name'])? $_POST['first_name'] : '';
            $new_last_name = isset($_POST['last_name'])? $_POST['last_name'] : '';
            $new_gender = isset($_POST['gender'])? $_POST['gender'] : '';
            $new_date_of_birth = isset($_POST['date_of_birth'])? $_POST['date_of_birth'] : '';

            $students_data[$id - 1] = ['id' => $id, 'first_name' => $new_first_name, 'last_name' => 'Sagou', 'gender' => $new_gender,'date_of_birth' => $new_date_of_birth];
        }
    }
    if(isset($_GET['delete'])){
        $id_to_delete = (int) $_GET['id'];
        unset($students_data[$id_to_delete - 1]);

    }

  $freeId = (integer) end($students_data)['id'] + 1;
    ?>


<div class="content">
    <h1>Students</h1>
    <a href="<?php echo url_for('/interfaces/students/create.php?freeId='.$freeId) ?>">Create New</a> <br>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Gender</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($students_data as $student ) { ?>
            <tr>
            <th scope="row"><?php echo $student['id'] ?></th>
            <td><?php echo $student['first_name']?></td>
            <td><?php echo $student['last_name'] ?></td>
            <td><?php echo $student['gender']  == 'M'? 'Male': 'female' ?></td>
            <td scope="col"><a href="<?php echo url_for('/interfaces/students/show.php?id='.$student['id'].'&first_name='.$student['first_name'].'&last_name='.$student['last_name'].'&gender='.$student['gender'].'&date_of_birth='.$student['date_of_birth']) ?>">View</a></td>

            <td scope="col"><a href="<?php echo url_for('/interfaces/students/edit.php?id='.$student['id'].'&first_name='.$student['first_name'].'&last_name='.$student['last_name'].'&gender='.$student['gender'].'&date_of_birth='.$student['date_of_birth']) ?>">Edit</a></td>

            <td scope="col"><a href="<?php echo url_for('/interfaces/students/index.php?id='.$student['id'].'&delete=true') ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </tbody>
    </table>
</div>
<?php include(SHARED_PATH .'/footer.php') ?>