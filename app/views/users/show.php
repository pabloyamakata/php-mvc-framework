<?php include_once Helper::rootDir() . 'app/views/inc/header.php'; ?>

    <h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>

    <p>Email: <?= $user['email'] ?></p>
    
    <p>Age: <?= $user['age'] ?></p>

    <p><a href=<?= Helper::domain() . 'usercontroller/edit/' . $user['id'] ?>>Edit</a></p>

    <form action=<?= Helper::domain() . 'usercontroller/destroy/' . $user['id'] ?> method="POST">
        <input type="submit" value="Delete">
    </form>

<?php include_once Helper::rootDir() . 'app/views/inc/footer.php'; ?>
