<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>
<?php $id = isset($_GET['freeId'])? $_GET['freeId']: 10;  ?>

<h1>Create</h1>
<div class="display-detail">
<form action = "<?php echo url_for('/interfaces/students/index.php?create=true') ?>" method="post">
  <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="ID">ID</label>
        <input readonly type="text" name="id" class="form-control" id="ID" value="<?php echo $id ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="firstname">First Name</label>
        <input type="text" name="first_name" class="form-control" id="firstname" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="lastname">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="lastname" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="date_of_birth">Date of birth</label>
        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
        </div>
    </div>

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" checked>
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
    <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <br>

    <button class="btn btn-primary" type="submit" style="margin-top: 2rem;">Save</button>

</form>
</div>
<a href="<?php echo url_for('./interfaces/students/index.php') ?>"><< Back</a>
<br>
<?php include(SHARED_PATH .'/footer.php') ?>