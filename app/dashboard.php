<?php

$title = 'Dashboard';
$page = 'dashboard';

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/header.php');

echo 'Bonjour ' . $_SESSION['USER']['FIRSTNAME'] . ' ' . $_SESSION['USER']['LASTNAME'] . ' !'

?>



<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/default/footer.php');

?>