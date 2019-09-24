<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/user.class.php');

if(isset($_POST['save'])){
    $user = new User($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
    $user->save();
    header('Location: /app/users/index.php');
}

$user = new User();

if($_GET['id'] != 0){
    $user = $user->getUser($_GET['id']);
}

if($user->id != null){
    $title = $user->firstname . ' ' . $user->lastname;
}else{
    $title = 'Add user';
}
$page = 'users';

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/header.php');

?>

<form method="POST">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $title; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <input type="submit" name="save" id="save" style="height:0px;width:0px;position:absolute;" />
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <a class="btn btn-sm btn-primary mr-2" href="javascript:document.getElementById('save').click();"><i class="fas fa-save"></i> Save</a>
                <a class="btn btn-sm btn-outline-secondary" href="/app/users/index.php"><i class="fas fa-ban"></i> Cancel</a>
            </div>
        </div>
    </div>

    <h4 class="my-4">General informations</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-row mb-3">
                <label class="col-sm-2 col-form-label" for="firstname">Firstname</label>
                <input type="text" class="form-control col-sm-10" name="firstname" id="firstname" value="<?php echo $user->firstname; ?>" required/>
            </div>
            <div class="form-row">
                <label class="col-sm-2 col-form-label" for="lastname">Lastname</label>
                <input type="text" class="form-control col-sm-10" name="lastname" id="lastname" value="<?php echo $user->lastname; ?>" required/>
            </div>
        </div>
    </div>
    
    <hr class="my-5">


    <h4 class="my-4">Login informations</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-row mb-3">
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <input type="email" class="form-control col-sm-10" name="email" id="email" value="<?php echo $user->email; ?>" required/>
            </div>
            <div class="form-row">
                <label class="col-sm-2 col-form-label" for="password">Password</label>
                <input type="password" class="form-control col-sm-10" name="password" id="password" <?php echo ($user->id == 0 ? 'required' : ''); ?>/>
                <?php if($user->id != 0){ ?><div class="offset-sm-2 col-sm-10"><small class="text-danger"><i class="fas fa-exclamation-circle"></i> Fill only if you want to modify it</small></div><?php } ?>
            </div>
        </div>
    </div>
</form>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/footer.php');

?>