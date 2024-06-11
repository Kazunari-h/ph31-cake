<?php

include './functions/common.php';
redirectIfUnauth();

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    header('Location: ./signin.php');
} else {
    header('Location: ./index.php');
}
