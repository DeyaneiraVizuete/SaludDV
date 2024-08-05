<br>
<h3 class="text-center">
    <b>DIRECCIÓN DE DOCTORES</b>
</h3>
<br>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>DNI: </th>
        <td><?php echo $doctordv->dni_doc_dv; ?></td>
        <th>APELLIDO: </th>
        <td><?php echo $doctordv->apellido_doc_dv; ?></td>
        <th>NOMBRE: </th>
        <td><?php echo $doctordv->nombre_doc_dv; ?></td>
        <th>ESPECIALIDAD: </th>
        <td><?php echo $doctordv->especialidad_doc_dv; ?></td>
    </tr>
    <tr>
        <th>LATITUD:</th>
        <td><?php echo $doctordv->latitud_doc_dv; ?></td>
        <th>LONGITUD:</th>
        <td><?php echo $doctordv->longitud_doc_dv; ?></td>
    </tr>
</table>

<br>
<div id="mapa-direccion" style="border: 1px solid black; height:450px; width:100%; margin-top:10px;"></div>

<script>

    function initMap(){

        //Crear el mapa en el cruadrito que le establecimos en el html

        var coordenadaCentral=new google.maps.LatLng(<?php echo $doctordv->latitud_doc_dv; ?>, <?php echo $doctordv->longitud_doc_dv; ?>);
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
            title:'<?php echo $doctordv->id_doc_dv; ?> <?php echo $doctordv->nombre_doc_dv; ?> ',
            draggable:true

        });
    }

</script>