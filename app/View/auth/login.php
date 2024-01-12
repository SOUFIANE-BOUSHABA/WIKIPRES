<?php include_once '../app/View/auth/head.php' ?>

<body>
    <div class="container d-flex justify-content-center mt-8" style="height: 600px;">
        <div class="d-flex w-full col-md-4 align-items-center">
            <form class="shadow p-3" id="formular" action="?uri=auth/loginUser" method="post" novalidate>

            <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <div class="valid-feedback">Valide.</div>
                    <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    <div class="valid-feedback">Valide.</div>
                    <div class="invalid-feedback">Veuillez entrer un mot de passe.</div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="submit" value="login" type="submit">Se connecter</button>
                </div>
                <div class="mt-3">
                    <p>If you don't have an account, <a href="?uri=auth/register">create one</a>.</p>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="./assets/js/auth.js"> </script>