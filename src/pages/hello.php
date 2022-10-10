<?php

$name = $request->query->get('name', 'World');
?>
Hello <?= htmlspecialchars(ucfirst($name), ENT_QUOTES, 'UTF-8') ?>
