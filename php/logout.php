<?php
setcookie('admin', null, time()-60*60);
header('location: ../index.html');