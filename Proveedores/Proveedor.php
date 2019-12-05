<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clasificador de Proveedores</title>
</head>
<body>
<h1>Clasificador de Proveedores</h1>

<h2>Tabla general de financieras</h2>
<form method="get" action="http://localhost:8080/Proveedores/Consulta.php">
<input type="submit" value="Consultar" /> 
</form>
<br>
    <?php
  echo 
    "
    <table width=\"20%\" border=\"1\" center>
        <tr>
        <td><b><center>Materia</center></b></td>
        <td><b><center>Boleta</center></b></td>
        <td><b><center>Industria</center></b></td>
        <td><b><center>Total</center></b></td>
    </tr>";
      include("abrirconexion.php");

          $resultados = mysqli_query($conexion,"SELECT materia,boleta,industria,Total FROM $vista order by Total ASC");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
                <tr>
                <td><center>".$consulta['materia']."</td>
                <td><center>".$consulta['boleta']."</td>
                <td><center>".$consulta['industria']."</td>
                <td><center>".$consulta['Total']."</td>
                </tr>
            ";
          }
      include("cerrarconexion.php");
        
  ?>

</body>
</html>