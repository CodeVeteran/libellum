<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/user.class.php');

$user = new User();

if($_GET['id'] != 0){
    $user = $user->getUser($_GET['id']);
}

if($user->id != null){
    $title = 'Delete ' . $user->firstname . ' ' . $user->lastname;

    if(isset($_POST['delete'])){
        $user->delete();
        header('Location: /app/users/index.php');
    }
}else{
    header('Location: /app/users/index.php');
}
$page = 'users';

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/header.php');

?>

<form method="POST">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $title; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <input type="submit" name="delete" id="save" style="height:0px;width:0px;position:absolute;" />
                <input type="hidden" name="id" value="<?php echo $user->id; ?>" />
                <a class="btn btn-sm btn-primary mr-2" href="javascript:document.getElementById('save').click();"><i class="fas fa-trash"></i> Delete</a>
                <a class="btn btn-sm btn-outline-secondary" href="/app/users/index.php"><i class="fas fa-ban"></i> Cancel</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">Are you sure you want to delete the user <?php echo $user->firstname; ?> <?php echo $user->lastname; ?> ?</div>
        </div>
    </div>
</form>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/footer.php');

?>