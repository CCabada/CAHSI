<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: /Classes/cs4342/Team1_am/index.html');
die;
?>