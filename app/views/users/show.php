<?php include_once Config::rootDirectory() . 'app/views/inc/header.php'; ?>

<h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>

<p>Email: <?= $user['email'] ?></p>
<p>Age: <?= $user['age'] ?></p>

<p><a href=<?= Config::domain() . 'usercontroller/edit/' . $user['id'] ?>>Edit</a></p>

<form action=<?= Config::domain() . 'usercontroller/destroy/' . $user['id'] ?> method="POST">
    <input type="submit" value="Delete">
</form>

<?php include_once Config::rootDirectory() . 'app/views/inc/footer.php'; ?>
