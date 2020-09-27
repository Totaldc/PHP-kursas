<?php

require 'bootloader.php';

is_logged_in() ? print 'WELCOME ' : header('Location: login.php');