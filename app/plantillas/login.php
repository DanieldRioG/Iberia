<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php ob_start() ?>
<form action="" method="post">
    <fieldset>
        <label class="ml-4 mt-3" for="eCorreo">Correo Electronico <input class="mt-3" type="email" name="eCorreo" id="correo"></label><br>
        <label class="ml-4" for="pwd">Contraseña <input class="ml-5" type="password" name="pwd" id="pass"></label><br>
        <input class="btn btn-info mt-3 ml-4" type="submit" value="LogIn" name="login">
</form>

<?php if (isset($_POST['login'])) : ?>
    <?php if ($usuarioParaLoguear === false) : ?>
        <?= 'CREDENCIALES INCORRECTAS'; ?>
    <?php else : ?>
        <?php $credenciales = password_verify($_POST['pwd'], $usuarioParaLoguear[0]['pwd']) ?>
        <?php if ($credenciales === true) : ?>
            <?php header('Location: ' . '/index.php?ctl=inicio') ?>
            <?= 'hola' ?>
            <?php $_SESSION['correo'] = $_POST['eCorreo'] ?>
        <?php endif ?>
    <?php endif; ?>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>

</html>