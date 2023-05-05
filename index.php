<?php

session_start();
require_once("validate.php");
$isOk = true;
$POST = null;
if (array_key_exists("status", $_GET)) {
    $isOk = false;
    if (array_key_exists('post', $_SESSION) && !is_null($_SESSION['post'])) {
        $POST = $_SESSION['post'];
        validate($POST);
    };

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"/>
    <title>Rubrica</title>
    <style>
        form > div {
            width: 500px;
        }
    </style>
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center" id="form">
    <h1 class="m-3">Aggiungi contatto:</h1>
    <div class="card">
        <div class="card-body">
            <form action=post.php method="POST" class="d-flex flex-column needs-validation "
                  enctype="multipart/form-data" id="form1" novalidate>
                <div class="mb-3">
                    <label for="file" class="form-label">Image contact</label>
                    <input type="file" class="form-control" id="image" name="image"/>

                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?php echo !$isOk ? $POST['nome'] : "" ?>" required/>

                </div>
                <div class="mb-3">
                    <label for="cognome" class="form-label">Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome"
                           value="<?php echo !$isOk ? $POST['cognome'] : "" ?>" required/>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php echo !$isOk ? $POST['email'] : "" ?>" required/>
                </div>
                <div class="mb-3">
                    <label for="cognome" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                           value="<?php echo !$isOk ? $POST['telefono'] : "" ?>" required/>
                </div>
                <div class="mb-3">
                    <label for="società" class="form-label">Società</label>
                    <input type="text" class="form-control" id="società" name="società"
                           value="<?php echo !$isOk ? $POST['società'] : "" ?>"/>
                </div>

                <button type="submit" class="btn btn-primary justify-self-center">
                    Inserisci
                </button>
                <button class="btn btn-primary justify-self-center my-2" id="reimposta">
                    Resetta
                </button>
            </form>

        </div>
    </div>
</div>
<script>
    const resetButton = document.querySelector("#reimposta");
    const inputs = document.querySelectorAll("#form1 > div > input");
    resetButton.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        inputs.forEach((i)=>i.value="");
    })
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false);

        })
    })()
</script>
</body>

</html>