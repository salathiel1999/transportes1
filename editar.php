<?php
if(!isset($_GET["idboleto"])) exit();
$idboleto = $_GET["idboleto"];
include_once "base_de_datos.php";
//Sentencia preparada (prepare)
//Primero una plantilla de la sentencia SQL se crea y se envía a la base de datos. 
//Algunos valores se dejan sin especificar, llamados parámetros y representados por un interrogante "?"
$sentencia = $base_de_datos->prepare("SELECT * FROM boleto WHERE idboleto = ?;");
$sentencia->execute([$idboleto]);
$datos1 = $sentencia->fetch(PDO::FETCH_OBJ);
if($datos1 === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?> 
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRANSPORTES</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
       
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Hola!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Inicio</a></li>
            
                        <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Editar Boleto</h1>
                            
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                             <!--   <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        </section>

	<div class="text-center mb-5">
		<h2 class="fw-bolder">Editar producto con el ID <?php echo $datos1->idboleto; ?></h2>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="idboleto" value="<?php echo $datos1->idboleto; ?>">

			<label for="idboleto">ID:</label>
			<input value="<?php echo $datos1->idboleto ?>" class="form-control" name="idboleto" required type="text" id="idoleto" placeholder="id del boleto">

			<label for="nombre">nombre:</label>
			<input value="<?php echo $datos1->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="nombre">
            <label for="apellidos">apellidos:</label>
			<input value="<?php echo $datos1->apellidos ?>" class="form-control" name="apellidos" required type="text" id="apellidos" placeholder="apellidos">
            <label for="origen">origen:</label>
			<input value="<?php echo $datos1->origen ?>" class="form-control" name="origen" required type="text" id="origen" placeholder="origen">
            <label for="destino">destino:</label>
			<input value="<?php echo $datos1->destino ?>" class="form-control" name="destino" required type="text" id="destino" placeholder="destino">

			<label for="fecha_hora">fecha_hora:</label>
			<input value="<?php echo $datos1->fecha_hora ?>" class="form-control" name="fecha_hora" required type="datetime" id="fecha_hora" placeholder="fecha_hora">

			<label for="precio">precio:</label>
			<input value="<?php echo $datos1->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="precio">
            <label for="hora_salidda">hora_salida:</label>
			<input value="<?php echo $datos1->hora_salida ?>" class="form-control" name="hora_salida" required type="datetime" id="hora_salida" placeholder="hora_salida">

            <br>

			
			
			<br><br><input class="btn btn-dark" type="submit" value="Guardar">
			<a class="btn btn-danger" href="./compraboletovista.php">Cancelar</a>
		</form>
	</div>

