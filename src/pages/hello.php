<?php

use Symfony\Component\HttpFoundation\Request;
?>
Hello <?= htmlspecialchars(ucfirst($name), ENT_QUOTES, 'UTF-8') ?>
