<!DOCTYPE>
<html>
 <head>
  <title>Productos</title>
 </head>
 <script>
  function redirectPost(url, data)
  { var form = document.createElement('form');
    document.body.appendChild(form);
    form.method = 'post';
    form.action = url;
    for(var name in data)
      { var input  = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value= data[name];
        form.appendChild(input);
      }
    form.submit();
  }
 </script>
 <body>
<?php
    require __DIR__.'/LoadProd.php';
    $email = $_POST['Email'];
    $clave = $_POST['Clave'];
    if( isset($email) && isset($clave))
      { $Values=LoadArts($email,$clave);
?>
  <table>
   <tr>
    <td>Id</td>
    <td>Nombre</td>
    <td>¿Servicio?</td>
    <td>Disponible</td>
    <td>Precio</td>
   </tr>
<?php
        for($i=0;$i<count($Values);$i++)
          { echo '<tr>';
            echo '<td>'.$Values[$i]['Id'].'</td>';
            echo '<td>'.$Values[$i]['Nombre'].'</td>';
            echo '<td>'.$Values[$i]['Servicio'].'</td>';
            echo '<td>'.$Values[$i]['Stock'].'</td>';
            echo '<td>'.$Values[$i]['Precio'].'</td>';
            echo '</tr>';
          }
?>
  </table>
<?php
      }
    else
      { echo "<script>redirectPost('http://localhost/Index.html', { Email:'$email',Clave:'$clave',Nombre:'$nombre'});</script>";
      }
?>
 </body>
</html>
