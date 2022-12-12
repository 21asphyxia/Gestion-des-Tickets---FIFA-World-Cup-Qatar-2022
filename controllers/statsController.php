<?php

$spectators = $dsn->getStats("SELECT COUNT(role) FROM users", array());


?>