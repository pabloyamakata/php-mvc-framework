<?php include_once Config::getRootDirectory() . 'app/views/inc/header.php'; ?>

<h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>

<p>Email: <?= $user['email'] ?></p>
<p>Age: <?= $user['age'] ?></p>

<p><a href=<?= Config::getDomain() . 'usercontroller/edit/' . $user['id'] ?>>Edit</a></p>

<form action=<?= Config::getDomain() . 'usercontroller/destroy/' . $user['id'] ?> method="POST">
    <input type="submit" value="Delete">
</form>

<?php include_once Config::getRootDirectory() . 'app/views/inc/footer.php'; ?>
