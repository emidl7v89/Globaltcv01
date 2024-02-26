<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 400px;
            margin: 0 auto; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Login</div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['login_error'])): ?>
                            <div id="alert" class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['login_error']; ?>
                            </div>
                            <?php unset($_SESSION['login_error']); ?>
                        <?php endif; ?>
                        <form id="login-form" action="../backend/verificar_admin.php" method="post">
                            <div class="form-group">
                                <label for="email" class="sr-only">Correo electrónico:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, si deseas utilizar componentes de Bootstrap que requieran JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Función para ocultar el alert cuando se ingresa datos en los campos de entrada
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const alertDiv = document.getElementById('alert');

            emailInput.addEventListener('input', hideAlert);
            passwordInput.addEventListener('input', hideAlert);

            function hideAlert() {
                alertDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>
