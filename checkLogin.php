<?php


if (!$_SESSION['user']) {

    header("Location: " . url('./logout.php'));
}




