<br>
<h3 class="text-center">
    <b>DIRECCIÓN CLÍNICAS</b>
</h3>
<br>
<?php if ($clinicas) : ?>
    <table class="table table-bordered table-striped table-hover" id="tbl-clinicas">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">TELEFONO</th>
                <th class="text-center">EMAIL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clinicas as $clinicaTemporal) : ?>
                <tr>
                    <td class="text-center"><?php echo $clinicaTemporal->id_cli; ?></td>
                    <td class="text-center"><?php echo $clinicaTemporal->nombre_cli; ?></td>
                    <td class="text-center"><?php echo $clinicaTemporal->telefono_cli; ?></td>
                    <td class="text-center"><?php echo $clinicaTemporal->email_cli; ?></td>
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

        <?php foreach($clinicas as $clinica): ?>
            var coordenada = new google.maps.LatLng(<?php echo $clinica->latitud_cli; ?>, <?php echo $clinica->longitud_cli; ?>);
            var marcador = new google.maps.Marker({
                position: coordenada,
                map: mapa1,
                title: '<?php echo $clinica->nombre_cli;?>',
                draggable:true,
                icon:'<?php echo base_url("assets/img/clinica.png");?>'
            });
        <?php endforeach; ?>
    }
</script>
