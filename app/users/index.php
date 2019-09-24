<?php

$title = 'Users';
$page = 'users';

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/user.class.php');

$user = new User();
$users = $user->getAllUsers();

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/header.php');

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="/app/users/edit.php?id=0"><i class="fas fa-plus"></i> Add user</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($users as $user){
                ?>
                        <tr>
                            <th scope="row"><?php echo $user['id']; ?></th>
                            <td><?php echo $user['firstname']; ?></td>
                            <td><?php echo $user['lastname']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <a href="/app/users/edit.php?id=<?php echo $user['id']; ?>" class="text-success">
                                    <i class="fas fa-edit fa-lg"></i> 
                                </a>
                                <a href="/app/users/delete.php?id=<?php echo $user['id']; ?>" class="text-danger">
                                    <i class="fas fa-trash fa-lg"></i> 
                                </a>
                            </td>
                        </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
<div>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/footer.php');

?>