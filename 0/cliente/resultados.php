<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Cliente</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include_once '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include_once '../../layouts/cabecera-body.php' ?>
				<hgroup> 
					<h1>Buscar Cliente</h1>
				</hgroup>
			</div>
                <?php
                    extract($_POST);

                    require_once '../../system/class.php';
                    if (isset($Actualizar)) :
                           
                        $Id_cliente=$Actualizar;
                        
                        $client = new cliente();
                        $client->modificar_cliente($mysqli,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente);
                        $fin = new finca();
                        $fin->modificar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Direccion2);

                    endif;
                    $client = new cliente();
                    //$client->consultar_cliente($mysqli,$Ced_cliente);
                    $reg = $client->consultar_cliente($mysqli,$Ced_cliente);
                    $fin = new finca();
                    $reg2=$fin->consultar_finca($mysqli,$Ced_cliente);
                    
                if (empty($reg)) :
                    header('Location: index.php?var1='.$_POST['Ced_cliente']);

                else : ?>
                    
                <center><h3>Datos del cliente</h3></center></br>

                    <form class="contact_form" method="post" action="index"  id="">
                        <table border=0 align="center">
                            <tr>
                                <th>CI:</th>
                                <td><?php echo $reg[1]?></td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td><?php echo $reg[2]?></td>
                            </tr>
                            <tr>
                                <th>Apellido:</th>
                                <td><?php echo $reg[3]?></td>
                            </tr>
                            <tr>
                                <th>Contacto:</th>
                                <td><?php echo $reg[4]?></td>
                            </tr>
                            <tr>
                                <th>Telefono:</th>
                                <td><?php echo $reg[5]?></td>
                            </tr>
                            <tr>
                                <th>Direccion:</th>
                                <td><?php echo $reg[6]?></td>
                            </tr>
                            <tr>
						       <th>Finca:</th>
						       <td><?php echo $reg2[2]?></td>
					        </tr>
                            <tr>
						       <th>Estado:</th>
						       <td><?php echo $reg2[3]?></td>
					        </tr>
                            <tr>
						       <th>Municipio:</th>
						       <td><?php echo $reg2[4]?></td>
					        </tr>
                            <tr>
						       <th>Direccion finca:</th>
						       <td><?php echo $reg2[5]?></td>
					        </tr>

                        </table>
                        <button type="submit" name="Modificar" value="<?php echo $reg[1]?>" class="boton" ><i class="fa fa-pencil-square-o"></i> Actualizar datos</button>
                        <button type="submit" formaction="finca" name="Finca" value="<?php echo $reg[1]?>" class="boton" ><i class="fa fa-plus"></i> Agregar Finca</button>
                        <button type="submit" formaction="../muestra/fitoOsue" name="RegistrarM" value="RegistrarM" class="boton" ><i class="fa fa-file-text-o"></i> Nueva solicitud</button>
                        <button type="submit" formaction="###" name="Productos" value="Productos" class="boton" ><i class="fa fa-shopping-cart"></i> Comprar Productos</button>
                    </form>
                <?php  endif;
                include_once '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>