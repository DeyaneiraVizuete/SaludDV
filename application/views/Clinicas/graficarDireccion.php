<br>
<h3 class="text-center">
    <b>DIRECCIÓN DE CLÍNICA</b>
</h3>
<br>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>NOMBRE: </th>
        <td><?php echo $clinica->nombre_cli; ?></td>
        <th>TELEFONO: </th>
        <td><?php echo $clinica->telefono_cli; ?></td>
        <th>EMAIL: </th>
        <td><?php echo $clinica->email_cli; ?></td>
    </tr>
    <tr>
        <th>LATITUD:</th>
        <td><?php echo $clinica->latitud_cli; ?></td>
        <th>LONGITUD:</th>
        <td><?php echo $clinica->longitud_cli; ?></td>
    </tr>
</table>
<br>
<div id="mapa-direccion" style="border: 1px solid black; height:450px; width:100%; margin-top:10px;"></div>

<script>

    function initMap(){

        //Crear el mapa en el cruadrito que le establecimos en el html

        var coordenadaCentral=new google.maps.LatLng(<?php echo $clinica->latitud_cli; ?>, <?php echo $clinica->longitud_cli; ?>);
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
            title:'<?php echo $clinica->id_cli; ?> <?php echo $clinica->nombre_cli; ?> ',
            draggable:true

        });
    }

</script>