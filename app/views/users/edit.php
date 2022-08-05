<?php include_once Config::rootDirectory() . 'app/views/inc/header.php'; ?>

<form action=<?= Config::domain() . 'usercontroller/update/' . $user['id'] ?> method="POST">

    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" value=<?= $user['firstname'] ?>>

    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname" value=<?= $user['lastname'] ?>>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value=<?= $user['email'] ?>>

    <label for="age">Age</label>
    <input type="number" id="age" name="age" value=<?= $user['age'] ?>>

    <input type="submit" value="Update User">

</form>

<?php include_once Config::rootDirectory() . 'app/views/inc/footer.php'; ?>
