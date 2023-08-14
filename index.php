<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <h1>Tickets</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-start mt-5">
                    <div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form action="guardarTieckt.php" method="post">
                                    <div>
                                        <label for="">Escriba el problema que se le presenta</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                                    </div>
                                    <button type="submit" class="bnt btn-success mt-3">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                require "tickets.php";
                $tickets = new Tickets();
                $reusults = $tickets->getTickets();
                ?>
                <div class="ticket">
                    <?php foreach ($reusults as $key => $value) { ?>
                        <div class="card text-start mt-1">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $value->id ?></h4>
                                <p class="card-text ticket-description"><?php echo $value->descripcion ?></p>
                                <form action="EliminarTicket.php" method="post">
                                    <input type="text" hidden value="<?php echo $value->id ?>" name="id">
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>