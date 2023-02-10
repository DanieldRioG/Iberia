<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php ob_start() ?>
<form action="" method="post">
    <fieldset>
        <label class="ml-4 mt-3" for="eCorreo">Correo Electronico <input class="mt-3" type="email" name="eCorreo" id="correo"></label><br>
        <label class="ml-4" for="pwd">Contraseña <input class="ml-5" type="password" name="pwd" id="pass"></label><br>
        <label class="ml-4" for="rol">Rol de Usuario &nbsp&nbsp</label><select class="ml-3" name="rol" id="rol">
            <option value="Usuario">Usuario</option>
            <option value="Trabajador">Trabajador</option>
            <option value="Admin">Admin</option>
        </select><br>
        <input class="btn btn-info mt-3 ml-4" type="submit" value="Registrar" name="registrar">
</form>

<?php if (isset($_POST['registrar'])) : ?>
    <?php if ($usuarioParaRegistrar === true) : ?>
        <?php echo 'USUARIO CREADO'; ?>
        <?php header('Location:' . './index.php?ctl=login') ?>
    <?php else : ?>
        <?= 'YA EXISTE EL USUARIO'; ?>
    <?php endif; ?>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>

</html>