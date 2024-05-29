<div class="contenedorParqueadero">
    <div class="salidaParqueadero">
        <div class="flechaSalida">
            <img src="images/flecha.png" alt="">
            <span><h2>SALIDA</h2></span>
        </div>
        <div class="base">
            <span>BASE</span>
        </div>
    </div>
    <div class="espacioParqueadero">
        
    <?php
      
        $item = null;
        $valor = null;
        $item2 = null;
        $encriptar = null;

        $isla = ControladorIsla::ctrMostrarIslas($item, $valor,$encriptar);
        $idIslas = array();
        foreach ($isla as $key => $value){
            $idIsla = $value["id_isla"];
            $idIslas[] = $idIsla;
        }
        $idIslasInvertido = array_reverse($idIslas); 
        $idIslas=$idIslasInvertido;
    echo'
        <div class="filaIslas">
            <div class="islas">
                <span>'.$idIslas[0].'</span>
                <span>'.$idIslas[1].'</span>
                <span>'.$idIslas[2].'</span>
                <span>'.$idIslas[3].'</span>
                <span>'.$idIslas[4].'</span>
                <span>'.$idIslas[5].'</span>
                <span>'.$idIslas[6].'</span>
                <span>'.$idIslas[7].'</span>
                <span>'.$idIslas[8].'</span>
                <span>'.$idIslas[9].'</span>
            </div>
        </div>
        
        <div class="corredorIslas" id="corredor1">
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
        </div>
        <div class="corredorIslas">
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
            <span class="contenedorFlecha">
                <img src="images/flecha.png" alt="">
            </span>
        </div>

        <div class="filaIslas">
            <div class="islas">
                <span>'.$idIslas[10].'</span>
                <span>'.$idIslas[11].'</span>
                <span>'.$idIslas[12].'</span>
                <span>'.$idIslas[13].'</span>
                <span>'.$idIslas[14].'</span>
                <span>'.$idIslas[15].'</span>
                <span>'.$idIslas[16].'</span>
                <span>'.$idIslas[17].'</span>
                <span>'.$idIslas[18].'</span>
                <span>'.$idIslas[19].'</span>
            </div>
        </div>';
        ?>
    </div>
</div>