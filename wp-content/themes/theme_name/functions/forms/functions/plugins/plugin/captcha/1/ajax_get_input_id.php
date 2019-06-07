<?php

$captcha_input_id =  $_POST['input_id'];

session_start();

$_SESSION['plugin']['plugin-name']['captha_input_id'] = intval($captcha_input_id);
