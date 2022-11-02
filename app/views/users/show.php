<?php include_once APP_DIR . 'views/inc/header.php'; ?>

    <h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>

    <p>Email: <?= $user['email'] ?></p>
    
    <p>Age: <?= $user['age'] ?></p>

    <p><a href=<?= APP_URL . 'users/' . $user['id'] . '/edit' ?>>Edit</a></p>

    <form action=<?= APP_URL . 'users/' . $user['id'] . '/destroy' ?> method="POST">
        <input type="submit" value="Delete">
    </form>

<?php include_once APP_DIR . 'views/inc/footer.php'; ?>
