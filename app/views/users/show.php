<?php include_once APP_DIR . 'views/inc/header.php'; ?>

    <h2><?= $user['firstname'] . ' ' . $user['lastname'] ?></h2>

    <p>Email: <?= $user['email'] ?></p>
    
    <p>Age: <?= $user['age'] ?></p>

    <p><a href=<?= APP_URL . 'usercontroller/edit/' . $user['id'] ?>>Edit</a></p>

    <form action=<?= APP_URL . 'usercontroller/destroy/' . $user['id'] ?> method="POST">
        <input type="submit" value="Delete">
    </form>

<?php include_once APP_DIR . 'views/inc/footer.php'; ?>
