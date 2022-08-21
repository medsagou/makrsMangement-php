<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>

<?php
$id = isset($_GET['id'])? $_GET['id'] : '';
$first_name = isset($_GET['first_name'])? $_GET['first_name'] : '';
$last_name = isset($_GET['last_name'])? $_GET['last_name'] : '';
$gender = isset($_GET['gender'])? $_GET['gender'] : '';
$date_of_birth_str = isset($_GET['date_of_birth'])? $_GET['date_of_birth'] : '';

$date = strtotime($date_of_birth_str);
$date_of_birth = date('Y-d-m', $date);


?>

<h1>Edit</h1>
<div class="display-detail">
<form action = "<?php echo url_for('/interfaces/students/index.php?edit=true') ?>" method="post">
  <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="ID">ID</label>
        <input readonly  type="text" name="id" class="form-control" id="ID" value="<?php echo $id ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="first_name" id="firstname" value="<?php echo $first_name ?>" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="lastname">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="lastname" value="<?php echo $last_name ?>" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="date_of_birth">Date of birth</label>
        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="<?php echo $date_of_birth; ?>" required>
        </div>
    </div>

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" <?php if($gender == 'M'){echo 'checked';} ?>>
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" <?php if($gender == 'F'){echo 'checked';} ?>>
    <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <br>

    <button class="btn btn-primary" type="submit" style="margin-top: 2rem;">Save changes</button>

</form>
</div>
<a href="<?php echo url_for('./interfaces/students/index.php') ?>"><< Back</a>
<br>
<?php include(SHARED_PATH .'/footer.php') ?>