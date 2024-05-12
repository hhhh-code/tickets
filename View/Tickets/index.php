<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="/public/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Ticket System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li>
                        <?php echo $this->AuthHelper->getUser()->name ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Login/Logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Tickets</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-start mt-5">
                    <div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form action="/Ticket/guardarTicket" method="post">
                                    <div>
                                        <label for="">Escriba el problema que se le presenta</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                                    </div>
                                    <div class="mt-2">
                                        <?php
                                        require __DIR__ . "/../../Model/Repository/UsuarioRepository.php";
                                        $tickets = new UsuarioRepository();
                                        $reusults = $tickets->getUsersByRol(1);
                                        ?>
                                        <label for="">Elija a alguin para asignar el ticket</label>
                                        <select name="encargado" id="encargado" class="form-control">
                                            <?php foreach ($reusults as $key => $value) { ?>
                                                <option value="<?php echo htmlspecialchars($value->id) ?>"><?php echo htmlspecialchars($value->name) ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="bnt btn-success mt-3">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                require_once __DIR__ . "/../../Model/Repository/TicketsRepository.php";
                $tickets = new TicketsRepository();
                $reusults = $tickets->getTickets();

                ?>
                <div class="ticket">
                    <?php foreach ($reusults as $key => $value) {  ?>
                        <div class="card text-start mt-1">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo htmlspecialchars($value->id) ?></h4>
                                <label class="btn-warning"><?php echo htmlspecialchars($value->name) ?></label>
                                <p class="card-text ticket-description"><?php echo htmlspecialchars($value->descripcion) ?></p>
                                <form action="/Ticket/eliminarTicket" method="post">
                                    <input type="text" hidden value="<?php echo htmlspecialchars($value->id) ?>" name="id">
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" onclick="editar(`<?php echo htmlspecialchars($value->id) ?>`,`<?php echo htmlspecialchars($value->descripcion) ?>`)" data-bs-target="#staticBackdrop">
                                    Editar
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <form action="/Ticket/editarTicket" method="post">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="id" class="form-contol" hidden>
                        <input type="text" name="descripcion" class="form-contol">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="/public/js/index.js"></script>

</body>

</html>