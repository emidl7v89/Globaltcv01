<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 4rem;
        }

        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            color: #fff;
        }

        .nav-link {
            color: #fff !important;
        }

        .nav-link:hover {
            color: #ccc !important;
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .card-link {
            color: inherit;
            text-decoration: none;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['welcome_message'])) {
        echo '<script>alert("' . $_SESSION['welcome_message'] . '");</script>';
        unset($_SESSION['welcome_message']);
    }
    ?>

    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-heading text-center">
            <span class="navbar-brand">Nombre de la Empresa</span>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <?php echo $_SESSION['email'] ?? ''; ?>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    Empleados
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-wrench"></i>
                    Servicios
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-box"></i>
                    Inventario
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-tasks"></i>
                    Operaciones
                </a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fas fa-align-left"></i>
                </button>
                <span class="navbar-brand ml-2">Dashboard</span>
                <div class="ml-auto">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#logoutModal">
                        Cerrar sesión
                    </button>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="card-link">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Empleados</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="card-link">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">Servicios</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="card-link">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Inventario</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="card-link">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Operaciones</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer mt-auto py-3 bg-dark text-white text-center">
            <div class="container">
                <span>© 2022 Nombre de la Empresa</span>
            </div>
        </footer>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Cerrar sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, si deseas utilizar componentes de Bootstrap que requieran JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
