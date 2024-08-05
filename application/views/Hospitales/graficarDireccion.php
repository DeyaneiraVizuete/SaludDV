<br>
<h3 class="text-center">
    <b>DIRECCION DE HOSPITAL</b>
</h3>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>NOMBRE: </th>
        <td><?php echo $hospital->nombre_hos; ?></td>
        <th>TELEFONO: </th>
        <td><?php echo $hospital->telefono_hos; ?></td>
        <th>EMAIL: </th>
        <td><?php echo $hospital->email_hos; ?></td>
        <th>NÚMERO CONSULTORIOS: </th>
        <td><?php echo $hospital->numero_consultorio_hos?></td>
        <th>NÚMERO MÉDICOS: </th>
        <td><?php echo $hospital->numero_medicos_hos?></td>
        <th>TIPO HOSPITAL: </th>
        <td><?php echo $hospital->tipo_hos?></td>
    </tr>
    <tr>
        <th>LATITUD:</th>
        <td><?php echo $hospital->latitud_hos; ?></td>
        <th>LONGITUD:</th>
        <td><?php echo $hospital->longitud_hos; ?></td>
    </tr>
</table>
<br>
<div id="mapa-direccion" style="border: 1px solid black; height:450px; width:100%; margin-top:10px;"></div>

<script>

    function initMap(){

        //Crear el mapa en el cruadrito que le establecimos en el html

        var coordenadaCentral=new google.maps.LatLng(<?php echo $hospital->latitud_hos; ?>, <?php echo $hospital->longitud_hos; ?>);
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
            title:'<?php echo $hospital->id_hos; ?> <?php echo $hospital->nombre_hos; ?> ',
            draggable:true

        });
    }

</script>