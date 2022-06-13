<?php
    use CoffeKonecta\Template\Template;
    $header = new Template('header');
?>
<body class="signin text-center">
    <main class="form-signin w-100 m-auto">
        <form id="login">
            <img class="mb-4" src="<?php echo BASE_URL;?>/Assets/img/logo_Konecta.svg" alt="" width="150" height="90">
            <h1 class="h3 mb-3 fw-normal">Por favor inicia sesión</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="userlogin" placeholder="name@example.com" required>
                <label for="floatingInput">Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="passlogin" placeholder="Password" required>
                <label for="floatingPassword">Contraseña</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recuerdame
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>

    <script src="<?php echo BASE_URL;?>/Assets/js/script.js"></script>