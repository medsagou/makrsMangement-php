<?php require_once('../../../private/ini.php') ?>
<?php include(SHARED_PATH .'/header.php') ?>

<?php $id = isset($_GET['freeId'])? $_GET['freeId']: 10;  ?>

<h1>Create</h1>
<div class="display-detail">
<form action = "<?php echo url_for('/interfaces/teachers/index.php?create=true') ?>" method="post">
  <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="ID">ID</label>
        <input readonly  type="text" name="id" class="form-control" id="ID" value = "<?php  echo $id?>">
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="first_name" id="firstname" required>
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

    <div class="mb-3 form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" checked>
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" >
    <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <br>

    First Subject :
    <div class="mb-3 form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectfirst" id="inlineRadio1" value="Mathematics" checked>
    <label class="form-check-label" for="inlineRadio1">Mathematics</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectfirst" id="inlineRadio2" value="French" >
    <label class="form-check-label" for="inlineRadio2">French</label>
    </div>    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectfirst" id="inlineRadio1" value="Arabic" >
    <label class="form-check-label" for="inlineRadio1">Arabic</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectfirst" id="inlineRadio2" value="English">
    <label class="form-check-label" for="inlineRadio2">English</label>
    </div>
    <br>

    Second Subject :
    <div class="mb-3 form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectsecond" id="inlineRadio1" value="Mathematics" checked>
    <label class="form-check-label" for="inlineRadio1">Mathematics</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectsecond" id="inlineRadio2" value="French">
    <label class="form-check-label" for="inlineRadio2">French</label>
    </div>    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectsecond" id="inlineRadio1" value="Arabic">
    <label class="form-check-label" for="inlineRadio1">Arabic</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="subjectsecond" id="inlineRadio2" value="English">
    <label class="form-check-label" for="inlineRadio2">English</label>
    </div>
    <br>
    <br>
    <button class="btn btn-primary" type="submit" style="margin-top: 2rem;">Save changes</button>

</form>
</div>
<a href="<?php echo url_for('./interfaces/teachers/index.php') ?>"><< Back</a>
<br>
<?php include(SHARED_PATH .'/footer.php') ?>