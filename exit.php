<?php
session_start();
$_SESSION['authorized'] = 0;
header("Location: /");