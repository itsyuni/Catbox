<?php
$idflname = isLoggedIn();
$flname_true = DB::query('SELECT flname_true FROM users WHERE id=:id', array(':id'=>$idflname))[0]['flname_true'];
