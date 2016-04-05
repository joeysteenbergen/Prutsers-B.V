<?php
unset($_SESSION);
session_destroy();
header("Location:http://localhost/prutsers-b.v/admin-cms/");
