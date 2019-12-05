<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="estilo.css">
        <title>Consulta de Proveedores</title>
    </head>
    <body>
        <h1>Consulta de Proveedores</h1>
        <form action="#" method="post">
        <p>Materia:
    <select name="Materia" class="select-css">
    <option value="disenio">Diseño</option>
    <option value="inteligencia">inteligencia</option>
    <option value="1conocimiento">1Conocimiento</option>
    <option value="2conocimiento">2Conocimiento</option>
    <option value="calidad">Calidad</option>
    </select>
    
    <p>Industria:
    <select name="Industria" class="select-css">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
    <option value="F">F</option>
    </select><br><br>
    <input type="submit" name="submit" value="Consulta por Materia y por Industria" class="button button1"  /> <br>
  
    </form>
        <?php
    echo 
        "
        <table width=\"20%\" border=\"1\" center  class=\"table\">
        <tr >
        <th ><b><center>Materia</center></b></th>
        <th><b><center>Boleta</center></b></th>
        <th><b><center>Industria</center></b></th>
        <th><b><center>Total</center></b></th>
         
        </tr>";
        
    if(isset($_POST['submit'])){
        $selected = $_POST['Materia'];
        $select = $_POST['Industria'];    

        include("abrirconexion.php");

            $resultados = mysqli_query($conexion,"SELECT materia,boleta,industria,Total FROM $vista where materia = '$selected' and industria='$select'  order by Total ASC");
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
        }
        if(isset($_POST['submit'])){
            $selected = $_POST['Industria'];    
    
            include("abrirconexion.php");
    
                $resultados = mysqli_query($conexion,"SELECT materia,boleta,industria,Total FROM $vista where industria ='$select' order by boleta ASC");
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
            }

    ?>
    </body>
</html>