<?php self::layout('views/layout'); ?>


<div id="login">

    <div class="logo">
        <i class="fa fa-leaf"></i>
        FRAGMENT
    </div>

    <div class="box">

        <form action="<?= url('/login') ?>" method="post">

            <input type="text" name="username" placeholder="Nom d'utilisateur" autocomplete="off" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>

    </div>

</div>