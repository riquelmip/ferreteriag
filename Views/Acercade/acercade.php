<?php
headerAdmin($data);
getModal('modalCargos', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-tags"></i>
                Acerca de
            </h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="text-white text-center bg-success mb-3">
                        <div class="card-header" style="font-size: x-large; text-align: left;">Información Adicional
                        </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span id="totalVenta"></span>
                        </h5>
                        
                <p style="text-align: justify;"><b>La aplicación web para la compra y venta de la ferretería Granadeño del municipio de Jiquilisco, Usulután., fue creado con la finalidad de poder ayudar al cliente a optimizar, dirigir, controlar y administrar de una forma más eficiente en el ámbito de obtener la información deseada en segundos con un sistema integrado que contemple el uso de un inventario de artículos para conocer el stock exacto de los productos una vez almacenado de una forma correcta, también la utilidad de poder mostrar imágenes del producto seleccionado, tener advertencias donde se le informe que el stock de cualquier producto se encuentra en el límite definido por el cliente para así poder llevar un mayor control sobre sus productos más y menos vendidos, incluyendo saber a qué proveedor se le compran más artículos</b></p>

                        
                    </div>
                </div>
                <div class="text-white text-center bg-success mb-3">
                <div class="card-header" style="font-size: x-large; text-align: left;">Manuales
                        </div>  </div>
                <div class="justify-content-md-end">
                    <a type="button" class="btn btn-light ms-4 mb-2 " onclick="window.open('Assets/images/ayuda/Manualdeinstalacion.pdf')" style="font-size: larger; background-color: green; border-color: black; color: white; "><i class=" bi bi-info-circle"></i> Manual de Instalación</a>
                    <a type="button" class="btn btn-light ms-4 mb-2 " onclick="window.open('Assets/images/ayuda/ManualdeUsuario.pdf')" style="font-size: larger; background-color: red; border-color: black; color: white; "><i class=" bi bi-info-circle"></i> Manual de Usuario</a>
                    <a type="button" class="btn btn-light ms-4 mb-2 " onclick="window.open('Assets/images/ayuda/ManualdeUsuario.pdf')" style="font-size: larger; background-color: blue; border-color: black; color: white; "><i class=" bi bi-info-circle"></i> Manual del Programador</a>
                </div>

            </div>
        </div>
    </div>
    </div>
    <?php footerAdmin($data); ?>