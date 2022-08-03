<?php include_once ROOT_PATH . 'app/views/inc/header.php'; ?>

<h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>
<p>Email: <?= $user['email'] ?></p>
<p>Age: <?= $user['age'] ?></p>

<?php include_once ROOT_PATH . 'app/views/inc/footer.php'; ?>
