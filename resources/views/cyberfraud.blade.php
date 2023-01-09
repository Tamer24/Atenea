@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cargar Ciber Fraude</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Carga Ciber Crimen</h1>
        <p>cualquier duda, consulten :)</p>
    </div>
    <form method="post" id="formulario" name="formulario">
        <div class="acordion">
            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                        Datos del crimen
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="container p-1 my-1 col-md-4">
                                <h6>Fecha:</h6>
                                <input id="date" class="form-control" type="date" name="date" />
                            </div>
                            <div class="container p-1 my-1 col-md-4">
                                <h6>Hora:</h6>
                                <div class="cs-form">
                                    <input type="time" class="form-control" id="time" name="time" />
                                </div>
                            </div>
                            <div class="container p-1 my-1 col-md-4">
                                <h6>¿Hay datos de hora?:</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="has_time" name="has_time" onchange="show('has_time', 'time')" checked>
                                    <label class="form-check-label">Sí</label>
                                </div>
                            </div>
                            <div class="container p-1 my-1 col-md-3">
                                <h6>Entidad Bancaria:</h6>
                                <?php
                                $mysqli = new mysqli($host, $username, $password, $db_name);

                                /* comprobar la conexión */
                                if ($mysqli->connect_errno) {
                                    printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                    exit();
                                }
                                echo '<select class="form-select form-select" id="bank"  onchange="otro(this.value,addbank)">';
                                if ($resultado = $mysqli->query("SELECT id,descripcion FROM bank_entities")) {
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        echo '<option value="' . htmlspecialchars($row[0]) . '">'
                                            . htmlspecialchars($row[1])
                                            . '</option>';
                                    }
                                    echo '<option value="0">Otro</option>';
                                    echo '</select>';
                                    /* liberar el conjunto de resultados */
                                    $resultado->close();
                                }

                                ?>
                            </div>
                            <div class="container p-1 my-1 col-md-2">
                                <div class="form-floating mb-2 mt-2" id="addbank" name="addbank" style="display: none">
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBankModal">
                                        Agregar Entidad Bancaria
                                    </button>
                                </div>
                            </div>
                            <div class="container p-1 my-1 col-md-3">
                                <h6>Tipo de fraude:</h6>
                                <?php
                                $mysqli = new mysqli($host, $username, $password, $db_name);

                                /* comprobar la conexión */
                                if ($mysqli->connect_errno) {
                                    printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                    exit();
                                }
                                echo '<select class="form-select form-select" id="bank" onchange="otro(this.value,addFraud_type)">';
                                if ($resultado = $mysqli->query("SELECT id,descripcion FROM fraud_types")) {
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        echo '<option value="' . htmlspecialchars($row[0]) . '">'
                                            . htmlspecialchars($row[1])
                                            . '</option>';
                                    }
                                    echo '<option value="0">Otro</option>';
                                    echo '</select>';
                                    /* liberar el conjunto de resultados */
                                    $resultado->close();
                                }

                                ?>
                            </div>
                            <div class="container p-1 my-1 col-md-2">
                                <div class="form-floating mb-2 mt-2" id="addFraud_type" name="addFraud_type" style="display: none">
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFraud_typeModal">
                                        Agregar Tipo de Fraude
                                    </button>
                                </div>
                            </div>
                            <div class="container p-1 my-1 col-md-2">
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Monto" aria-label="Username" aria-describedby="basic-addon1" type="number" step="0.01">
                                </div>
                            </div>
                            <div class="container p-1 my-1 col-md-11">
                                <h6>Para Explayarse:</h6>
                                <div class="form-floating mb-2 mt-2">
                                    <input type="text" class="form-control" id="other" placeholder="Redactar" name="other">
                                    <label for="other">Redacción</label>
                                </div>
                            </div>
                            <div class="container p-5 my-8 col-md-1">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="popover" title="¿Qué Hacer?" data-bs-content="Este espacio se ocupara para explayarse, en caso de que algun dato de importancia que no pueda ser plasmado en la carga">?</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                Victima
                                <a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2 ">
                                            <input type="text" class="form-control" id="victimName" placeholder="Cargar Nombre" name="victimName" onkeypress="validateNames(victimName,errorNombreVictima)" required>
                                            <label for="victimName">nombre</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1 col-md-2">
                                        <p><span style="color:red">*</span></p>
                                        <h4 id="errorNombreVictima"><span style="color:red"></span></h4>
                                    </div>
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" id="victimLastName" placeholder="Cargar apellido" name="victimLastName">
                                            <label for="victimLastName">apellido</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1 col-md-2">
                                        <p id="error"><span style="color:red">*</span></p>
                                    </div>
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" id="DNIVictima" placeholder="Cargar DNI" name="DNIVictima">
                                            <label for="DNI">DNI</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1">
                                        <div class="form-floating mb-2 mt-2" id="victimAddLocation">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#victimAddLocationModal">
                                                Agregar Domicilio
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Presunto Autor
                                <a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2 ">
                                            <input type="text" class="form-control" id="authorName" placeholder="Cargar Nombre" name="authorName" required>
                                            <label for="authorName">nombre</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" id="authorLastName" placeholder="Cargar apellido" name="authorLastName">
                                            <label for="authorLastName">apellido</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1 col-md-4">
                                        <div class="form-floating mb-2 mt-2">
                                            <input type="text" class="form-control" id="authorDni" placeholder="Cargar DNI" name="authorDni">
                                            <label for="r">DNI</label>
                                        </div>
                                    </div>
                                    <div class="container p-1 my-1">
                                        <div class="form-floating mb-2 mt-2" id="authorAddLocation">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authorAddLocationModal">
                                                Agregar Domicilio
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container p-1 my-1">
                    <div class="form-floating mb-2 mt-2">
                        <p type="submit" id="errMsg" name="errMsg" value="Guardar"></p>
                    </div>
                </div>
                <form method="post">
                    <div class="container p-1 my-1">
                        <div class="form-floating mb-2 mt-2">
                            <input type="submit" class="btn btn-primary" id="save" name="save" value="Guardar" />
                        </div>
                    </div>
                </form>
                <?php
                // if (array_key_exists('save', $_POST)) {
                //     button1();
                // }
                // function button1()
                // {
                //     $time = $_POST['time'];
                //     $date = $_POST['date'];
                //     $victimName = $_POST['victimName'];
                //     $victimLastName = $_POST['victimLastName'];
                //     $author = $_POST['has_time'];
                //     echo $date, "<br>";
                //     echo $time, "<br>";
                //     echo $victimName, "<br>";
                //     echo $victimLastName, "<br>";
                //     echo $author, "<br>";
                // }
                ?>
                <!-- Modal -->
                <div class="modal fade" id="addBankModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBankModalLabel">Cargar nueva entidad bancaria</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container p-1 my-1">
                                    <div class="form-floating mb-2 mt-2">
                                        <input type="text" class="form-control" id="bankName" placeholder="Cargar Nombre" name="bankName">
                                        <label for="bankName">nombre</label>
                                    </div>
                                </div>
                                <div class="container p-1 my-1">
                                    <div class="form-floating mb-2 mt-2">
                                        <input type="text" class="form-control" id="bankLocation" placeholder="Cargar Ubicacion" name="bankLocation">
                                        <label for="bankLocation">ubicacion</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addFraud_typeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addFraud_typeLabel">Cargar nuevo tipo de fraude</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container p-1 my-1">
                                    <div class="form-floating mb-2 mt-2">
                                        <input type="text" class="form-control" id="fraud_typeName" placeholder="Cargar Nombre" name="fraud_typeName">
                                        <label for="fraud_typeName">nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="victimAddLocationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="locationModalLabel">Cargar Ubicacion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container p-1 my-1">
                                    <label for="exampleDataList" class="form-label">Ciudad</label>
                                    <?php
                                    $mysqli = new mysqli($host, $username, $password, $db_name);

                                    /* comprobar la conexión */
                                    if ($mysqli->connect_errno) {
                                        printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                        exit();
                                    }
                                    echo '<input class="form-control" list="citiesDatalistOptions" id="citiesDataList" placeholder="Escribir para buscar...">';
                                    echo '<datalist id="citiesDatalistOptions">';
                                    if ($resultado = $mysqli->query("SELECT id,nombre FROM cities")) {
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . htmlspecialchars($row[0]) . '">'
                                                . htmlspecialchars($row[1])
                                                . '</option>';
                                        }
                                        echo '</datalist>';
                                        /* liberar el conjunto de resultados */
                                        $resultado->close();
                                    }

                                    ?>
                                </div>
                                <div class="container p-1 my-1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div><!-- Modal -->
                <div class="modal fade" id="authorAddLocationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="locationModalLabel">Cargar Ubicacion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container p-1 my-1">
                                    <label for="exampleDataList" class="form-label">Ciudad</label>
                                    <?php
                                    $mysqli = new mysqli($host, $username, $password, $db_name);

                                    /* comprobar la conexión */
                                    if ($mysqli->connect_errno) {
                                        printf("Falló la conexión: %s\n", $mysqli->connect_error);
                                        exit();
                                    }
                                    echo '<input class="form-control" list="citiesDatalistOptions" id="citiesDataList" placeholder="Escribir para buscar...">';
                                    echo '<datalist id="citiesDatalistOptions">';
                                    if ($resultado = $mysqli->query("SELECT id,nombre FROM cities")) {
                                        while ($row = mysqli_fetch_array($resultado)) {
                                            echo '<option value="' . htmlspecialchars($row[0]) . '">'
                                                . htmlspecialchars($row[1])
                                                . '</option>';
                                        }
                                        echo '</datalist>';
                                        /* liberar el conjunto de resultados */
                                        $resultado->close();
                                    }

                                    ?>
                                </div>
                                <div class="container p-1 my-1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</body>

</html>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    function show(checkbox, item) {
        var check = document.getElementById(checkbox);
        var i = document.getElementById(item);
        console.log(check.checked);
        if (check.checked) {
            i.style.display = "block";
        } else {
            i.style.display = "none";
        }
    }

    function otro(value, show) {
        if (value == "0") {
            show.style.display = "initial";
        } else {
            show.style.display = "none";
        }
    }
    const amountField = document.getElementById('amount');
    const isValidAmount = amountField.checkValidity();
    const signUpForm = document.getElementById('formulario');
    const saveButton = document.getElementById('save');
    if (!isValidAmount) {
        document.getElementById("errMsg").innerHTML = inpObj.validationMessage;
    }
    amount.addEventListener('keyup', function(event) {
        isValidAmount = amount.checkValidity();
    });
    saveButton.addEventListener('click', function(event) {
        signUpForm.submit();
    });
    if (isValidAmount) {
        save.disabled = false;
    } else {
        save.disabled = true;
    }
</script>
@endsection
