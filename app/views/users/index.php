<?php include_once Config::getRootDirectory() . 'app/views/inc/header.php'; ?>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach($users as $user): ?>

        <tr>
            <td><?= $user['firstname'] ?></td>
            <td><?= $user['lastname'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><a href=<?= Config::getDomain() . 'usercontroller/show/' . $user['id'] ?>>Show</a></td>
        </tr>

        <?php endforeach; ?>

    </tbody>
</table>

<a href=<?= Config::getDomain() . 'usercontroller/create' ?>>Create User</a>

<?php include_once Config::getRootDirectory() . 'app/views/inc/footer.php'; ?>
