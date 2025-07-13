
<?php
session_start();
session_destroy();
header('Location: /sistema_vendas_tii09/index.php');
exit();
