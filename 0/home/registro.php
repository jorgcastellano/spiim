<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de registro - S.P.I.I. Sede Mérida</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
                <hgroup>
                    <h1>Panel de registro del SPIIM</h1>
                </hgroup>
            </div>
            <label><b>Instrucciones</b></label>
            <ul>
                <li> Los nombres de usuario podrían contener solo dígitos, letras mayúsculas, minúsculas y guiones bajos.</li>
                <li> Los correos electrónicos deberán tener un formato válido. </li>
                <li> Las contraseñas deberán tener al menos 6 caracteres.</li>
                <li>Las contraseñas deberán estar compuestas por:
                    <ul>
                        <li> Por lo menos una letra mayúscula (A-Z)</li>
                        <li> Por lo menos una letra minúscula (a-z)</li>
                        <li> Por lo menos un número (0-9)</li>
                    </ul>
                </li>
                <li> La contraseña y la confirmación deberán coincidir exactamente.</li>
            </ul>
            <form class="contact_form" id="contact_form" action="register_success" method="post" name="form_registro">
                <span class="required_notification"><i class="fa fa-asterisk" ></i> Datos requeridos</span><br /><br />
                <div>
                    <label>Cédula: </label>
                    <input required type="text" name="cedula" id="cedula" placeholder="00 000 000" pattern="\d{6,}" maxlength="8" >
                    <span class="form_hint">Debe contener al menos 6 dígitos</span><br />
                    <label>Nombre y Apellido: </label>
                    <input required type='text' name='usuario' id='usuario' placeholder="Nombre del usuario" />
                    <span class="form_hint">Debe tener siempre la primera letra en "Mayúscula"</span><br />
                    <label>Correo electrónico: </label>
                    <input required type="email" name="email" id="email" placeholder="usuario@ejemplo.com" />
                    <span class="form_hint">Formato correcto: "name@inia.gob.ve"</span><br />
                    <label>Contraseña: </label>
                    <input required type="password" name="password" id="password" placeholder="Contraseña" /><br>
                    <label>Confirmar contraseña: </label>
                    <input required type="password" name="confirmpwd" id="confirmpwd" placeholder="Reescriba la contraseña" /><br>
                    <label>Pregunta de seguridad:</label>
                    <select required name="pregunta" id="pregunta">
                        <option value="0"> -- seleccione una pregunta -- </option>
                        <option value="1">¿Nombre de su primera mascota?</option>
                        <option value="2">¿Cuál fué su apellido de soltera?</option>
                        <option value="3">¿Quién fué su superhéroe de niño(a)?</option>
                        <option value="4">¿Cuál es su comida favorita?</option>
                        <option value="5">¿Cuál es su pasatiempo?</option>
                        <option value="6">¿Como se llama su primer hijo(a)?</option>
                        <option value="7">¿Dónde nació?</option>
                        <option value="8">¿Dónde fué su bautizo?</option>
                        <option value="9">¿Dónde cursó el primer año escolar?</option>
                    </select>
                    <input required type="text" name="resp" id="resp" placeholder="Respuesta" /><br />
                    <button class="boton" type="buttom" onclick="location.href='index'" ><– Página principal</button>
                    <button class="boton" type="submit">Registrarse</button>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>