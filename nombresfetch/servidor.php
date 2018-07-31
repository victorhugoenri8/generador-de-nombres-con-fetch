
<?php 

    require "conexion.php";

   $persona=$_GET['persona'];
   $usuarioIDActualizado=$_GET['usuarioIDActualizado'];
   $nombreActualizado=$_GET['nombreActualizado'];
   $usuarioIDEliminado=$_GET['usuarioIDEliminado'];
   $correoNuevo=$_GET['correoNuevo'];
   $usuarioNuevo=$_GET['usuarioNuevo'];
   $apellidoNuevo=$_GET['apellidoNuevo'];


   $nombreID="nombreID";
   $emailID="emailID";
   $actualizar="actualizar";
   $borrar="borrar";


 
   if ($persona==="persona") {
   
     $resultado= mysqli_query($con, "SELECT * FROM clientes");
       echo '<div id="container">';
       echo '  <table  class=" table">';
       echo '  <thead>';
       echo '  <tr>';
       echo '  <th>Firstname</th>';
       echo '  <th>Lastname</th>';
       echo '  <th>Email</th>';
       echo '  </tr>';
       echo '  </thead>';

       while ($fila=mysqli_fetch_assoc($resultado)) {

        echo '<tbody>';

        echo '<tr>';
        echo '<td  id="'.$nombreID.$fila['id_cliente'].'">'.$fila['nombre'].'</td>';
        
        echo '<td type="hidden" >'.$fila['apellido'].'</td>';
        
        echo '<td type="hidden" id="'.$emailID.$fila['id_cliente'].'">'.$fila['email'].'</td>';
        
        echo '<td><input type="button" value="editar"  id="'.$fila['id_cliente'].'" onclick="editarusuario(this.id)" class="btn btn-success" ></td>';
        
        echo '<td> <input type="button" value="Borrar" id="'.$borrar.$fila['id_cliente'].'" onclick="usuarioEliminado('.$fila['id_cliente'].')" class="btn btn-danger"></td>';
        
        echo '<td > <input type="button" value="Actualizar" id="'.$actualizar.$fila['id_cliente'].'" onclick="actualizarUsuario('.$fila['id_cliente'].')" class="btn btn-primary" style="display:none;"></td>';
        
        echo '<td><input type="button" value="Ver"  id="mirar" onclick="toggleOverlay(this)" class="btn btn-success rata" ></td>';
        echo '</tr>';

   }
        echo '</tbody>';

        echo '  </table>';
        echo '</div>';

      mysqli_close($con);
         };
        

    if (!empty($nombreActualizado)) {
       $cliente = mysqli_real_escape_string($con, $nombreActualizado);
       $resultado= mysqli_query($con, " UPDATE clientes SET nombre = '$cliente' WHERE id_cliente='$usuarioIDActualizado'" );

       mysqli_close($con);

    };


    if (!empty($usuarioIDEliminado)) {
       
       $resultado= mysqli_query($con, " DELETE FROM clientes  WHERE id_cliente='$usuarioIDEliminado'" );

       mysqli_close($con);

    };


    if (!empty($usuarioNuevo) && !empty($correoNuevo) && !empty($apellidoNuevo)) {
       
       $resultado= mysqli_query($con, " INSERT INTO clientes  values( '$usuarioNuevo', '$apellidoNuevo', NULL, '', '0', '$correoNuevo')" );

       mysqli_close($con);

    };




 ?>	



