<br>
<h3 class="text-center">
    <b>DIRECCIÓN MATERNIDADES</b>
</h3>
<br>
<?php if ($maternidades) : ?>
    <table class="table table-bordered table-striped table-hover" id="tbl-maternidades">
        <thead>
            <tr>
                <th class="text-center">ID</th> 
                <th class="text-center">NOMBRE</th>
                <th class="text-center">TELÉFONO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">CAPACIDAD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($maternidades as $maternidadTemporal) : ?>
                <tr>
                    <td class="text-center"><?php echo $maternidadTemporal->id_mat; ?></td>
                    <td class="text-center"><?php echo $maternidadTemporal->nombre_mat; ?></td>
                    <td class="text-center"><?php echo $maternidadTemporal->telefono_mat; ?></td>
                    <td class="text-center"><?php echo $maternidadTemporal->email_mat; ?></td>
                    <td class="text-center"><?php echo $maternidadTemporal->capacidad_mat; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif; ?>
<br>
<div id="mapa-direccion" style="border:1px solid black; height:450px; width:100%"></div>

<script>
    function initMap(){
        var coordenadaCentral = new google.maps.LatLng(-0.11709584500070387, -78.41606623166749); 
        var mapa1 = new google.maps.Map(
            document.getElementById('mapa-direccion'),
            {
                center:coordenadaCentral,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
        );

        <?php foreach($maternidades as $maternidad): ?>
            var coordenada = new google.maps.LatLng(<?php echo $maternidad->latitud_mat; ?>, <?php echo $maternidad->longitud_mat; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $maternidad->nombre_mat;?>',
                draggable:true,
                icon:'<?php echo base_url("assets/img/maternidad.png");?>'
            });
        <?php endforeach; ?>
    }
</script>
