<?php if(isset($user)){ ?>
    <div id="info-user" class="dropdown">
        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" title="User">
            <span class="glyphicon glyphicon-user"></span>
        </a>
        <input type="hidden" id="id-usr" value="<?=$id ?>">
        <ul class="dropdown-menu info-user" role="menu">
            <li role="presentation">
                <p>Usuario: <?=$user ?></p>
            </li>
            <li role="presentation">
                <p>E-mail: <?=$email ?></p>
            </li>
            <li role="presentation">
                <p><span class="glyphicon glyphicon-pencil edit-usr"></span> Estudios: <?=$gradoEstudios ?></p>
            </li>
            <li role="presentation">
                <p><span class="glyphicon glyphicon-pencil edit-usr"></span> Ocupación: <?=$ocupacion ?></p>
            </li>
            <?php if($tipo == 0){ ?>
            <li role="presentation">
                <p><span class="glyphicon glyphicon-pencil edit-psw"></span> Contraseña: ******</p>
            </li>
            <?php }?>    
            <li role="presentation" class="divider"></li>
            <li role="presentation">
                <a id="logout-facebook"><p><strong>Cerrar Sesion</strong></p></a>
            </li>
        </ul>
    </div>
    <?php }else{ ?>
    <a id="login-modal" class="logueo" href="#" title="Login">
        Login
    </a>
     <?php } ?>