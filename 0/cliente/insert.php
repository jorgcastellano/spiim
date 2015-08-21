<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Cliente</title>
        <?php include '../../layouts/head.php'; ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Cliente</h1>
				</hgroup>
			</div>

				<?php
                extract($_POST);

                require_once '../../system/class.php';
				$client = new cliente();
				$client->registrar_cliente($mysqli,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente);
				$reg = $client->consultar_cliente($mysqli,$Ced_cliente);
				

                for ($i=0;$i<count($Estado);$i++){ $Estado=$Estado[$i]; }
                for ($i=0;$i<count($Municipio);$i++){ $Municipio=$Municipio[$i]; }


                $fin = new finca();
                $fin->registrar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Direccion2);
                $reg2=$fin->consultar_finca($mysqli,$Ced_cliente);
				?>

            <form class="contact_form" method="post" action="index"  id="">
				<table>
                    <tr>
                        <td>CI:</td>
                        <td><?php echo $reg[1]?></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><?php echo $reg[2]?></td>
                    </tr>
                    <tr>
                        <td>Apellido:</td>
                        <td><?php echo $reg[3]?></td>
                    </tr>
                    <tr>
                        <td>Contacto:</td>
                        <td><?php echo $reg[4]?></td>
                    </tr>
                    <tr>
                        <td>Telefono:</td>
                        <td><?php echo $reg[5]?></td>
                    </tr>
                    <tr>
                        <td>Direccion:</td>
                        <td><?php echo $reg[6]?></td>
                    </tr>
                    <tr>
                        <td>Finca:</td>
                        <td><?php echo $reg2[2]?></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><?php echo $reg2[3]?></td>
                    </tr>
                    <tr>
                        <td>Municipio:</td>
                        <td><?php echo $reg2[4]?></td>
                    </tr>
                    <tr>
                        <td>Direccion finca:</td>
                        <td><?php echo $reg2[5]?></td>
                    </tr>

				</table>
              
                    
                    <button type="submit" name="Modificar" value="<?php echo $reg[1]?>" class="boton" ><i class="fa fa-edit"></i> Modificar</button>
                    <button type='submit' formaction="fitoOsue" name="RegistrarM" value="RegistrarM" class="boton"><i class="fa fa-file-text-o"></i> Registrar Muestra</button>
                    <button type="submit" formaction="pro" name="Productos" value="Productos" class="boton" ><i class="fa fa-shopping-cart"></i> Comprar Productos</button>
          
			</form>

                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>