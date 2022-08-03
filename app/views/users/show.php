<?php include_once ROOT_PATH . 'app/views/inc/header.php'; ?>

<h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>
<p>Email: <?= $user['email'] ?></p>
<p>Age: <?= $user['age'] ?></p>
<p><a href=<?= DOMAIN . 'usercontroller/edit/' . $user['id'] ?>>Edit</a></p>
<form action=<?= DOMAIN . 'usercontroller/destroy/' . $user['id'] ?> method="POST">
    <input type="submit" value="Delete">
</form>

<?php include_once ROOT_PATH . 'app/views/inc/footer.php'; ?>
