<?php include_once APP_DIR . 'views/inc/header.php'; ?>

    <form action=<?= APP_URL . 'users/store' ?> method="POST">
        
        <div>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname">
        </div>

        <?php if(session()->hasError('firstname')) echo session()->getError('firstname'); ?>
    
        <div>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname">
        </div>

        <?php if(session()->hasError('lastname')) echo session()->getError('lastname'); ?>
    
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <?php if(session()->hasError('email')) echo session()->getError('email'); ?>
    
        <div>
            <label for="age">Age</label>
            <input type="number" id="age" name="age">
        </div>

        <?php if(session()->hasError('age')) echo session()->getError('age'); ?>
    
        <input type="submit" value="Create User">
    
    </form>

    <?php if(session()->has('success')) echo session()->get('success'); ?>

<?php include_once APP_DIR . 'views/inc/footer.php'; ?>
