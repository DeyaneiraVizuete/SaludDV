<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Registrar Maternidades </h3>
            <hr>
            <form action="<?php echo site_url('Maternidades/guardar'); ?>" id="frm_registrar_maternidad" method="post">
                <br>
                <label for=""><b>Nombre Maternidad: </b></label>
                <input type="text" name="nombre_mat" id="nombre_mat" placeholder="Ingrese el nombre de la maternidad" class="form-control">
                <br>
                <label for=""><b>Telefono: </b></label>
                <input type="text" name="telefono_mat" id="telefono_mat" placeholder="Ingrese telefono de la maternidad" class="form-control">
                <br>
                <label for=""><b>Email: </b></label>
                <input type="email" name="email_mat" id="email_mat" placeholder="Ingrese email de la maternidad" class="form-control">
                <br>
                <label for=""><b>Capacidad: </b></label>
                <input type="text" name="capacidad_mat" id="capacidad_mat" placeholder="Ingrese capacidad de la maternidad" class="form-control">
                <br>
                <label for=""><b>Dirección: </b></label>
                <input type="number" name="latitud_mat" id="latitud_mat" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <input type="number" name="longitud_mat" id="longitud_mat" readonly placeholder="Seleccione la ubicación en el mapa" class="form-control">
                <br>
                <div id="mapa-direccion" style="border:1px solid black; height:250px; width:100%; margin.top:10px;"></div>
                <br>
                <button class="btn btn-success" type="Submit">Guardar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- reset es para limpiar los campos-->
                <button class="btn btn-light" type="reset">Cancelar</button> 
            </form>
        </div>
        <div class="col-md-8"> 
            <h3 class="text-center">Listado de Maternidades</h3>
            <br>
            <div class="text-end">
                <a href="<?php echo site_url('Maternidades/reporteMaternidad');?>" class="btn btn-secondary">Ver Todas las Maternidades</a>
            </div>
            <br>
            <?php if($maternidades): ?>
                <table class="table table-bordered table-striped table hover" id="tbl-maternidades">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">TELÉFONO</th>
                            <th class="text-center">EMAIL</th>
                            <th class="text-center">CAPACIDAD</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>   
                    </thead>
                    <tbody>
                        <?php foreach($maternidades as $maternidadTemporal): ?>
                            <tr>
                                <td class="text-center"><?php echo $maternidadTemporal->id_mat; ?></td>
                                <td class="text-center"><?php echo $maternidadTemporal->nombre_mat; ?></td>
                                <td class="text-center"><?php echo $maternidadTemporal->telefono_mat; ?></td>
                                <td class="text-center"><?php echo $maternidadTemporal->email_mat; ?></td>
                                <td class="text-center"><?php echo $maternidadTemporal->capacidad_mat; ?></td>
                                <td class="text-center">
                                <a href="<?php echo site_url('Maternidades/graficarDireccion'); ?>/<?php echo $maternidadTemporal->id_mat; ?>" 
                                        class="btn btn-primary" target="_blank">Ver Dirección</a>
                                    <a href="#" class="btn btn-warning">Editar</a>
                                    <a href="<?php echo site_url('Maternidades/eliminar'); ?>/<?php echo $maternidadTemporal->id_mat; ?>" class="btn btn-danger" onclick="return confirm('Esta seguro de elimiar la maternidad?');">Eliminar</a>
                            </td>
                            </tr>
                        
                        <?php endforeach; ?>
                    </tbody>
                </table>
           
                <?php // print_r($clientes); ?>
            <?php else: ?>                    
                <h3 style="color:red;">
                    No existen maternidades regitradas
                </h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<br><br>
<script>
    function initMap(){
        var coordenadaCentral=new google.maps.LatLng(-0.9291329531385978, -78.620709850085);
        var mapa1=new google.maps.Map(
            document.getElementById('mapa-direccion'),
            {
                center:coordenadaCentral,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );
        var marcador=new google.maps.Marker({
            position:coordenadaCentral,
            map:mapa1,
            title:'Seleccion de dirección',
            draggable:true,
            icon:'<?php echo base_url("assets/img/maternidad.png");?>'
        });
        google.maps.event.addListener(
            marcador,
            'dragend',
            function(event){
                var latitud=this.getPosition().lat();
                var longitud=this.getPosition().lng();
                //alert(latitud+"----"+longitud);//prueba
                document.getElementById('latitud_mat').value=latitud;
                document.getElementById('longitud_mat').value=longitud;
            }
        );
    }
</script>