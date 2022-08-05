<?php include_once Config::rootDirectory() . 'app/views/inc/header.php'; ?>

<form action=<?= Config::domain() . 'usercontroller/store' ?> method="POST">
    
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname">

    <label for="lastname">Last Name</label>
    <input type="text" id="lastname" name="lastname">

    <label for="email">Email</label>
    <input type="email" id="email" name="email">

    <label for="age">Age</label>
    <input type="number" id="age" name="age">

    <input type="submit" value="Create User">

</form>

<?php include_once Config::rootDirectory() . 'app/views/inc/footer.php'; ?>
