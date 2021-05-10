
<body>
    <nav id="menu">
        <ul>
            <li><a href="#" id="menu_inicio" ><i class="fas fa-home"></i> INICIO</a>
            </li>
            <li><a href="#" ><i class="fas fa-box-open"></i> ALMACEN</a>
                <ul>
                    <li><a href="#" id="menu_producto"><i class="fas fa-cube"></i> PRODUCTO</a>
                    </li>
                    <li><a href="#" id="menu_categoria"><i class="fas fa-bookmark"></i> CATEGORIA</a>
                    </li>
                    <li><a href="#" id="menu_entrada"><i class="fas fa-plus"></i> ENTRADA</a>
                    </li>
                    <li><a href="#" id="menu_salida"><i class="fas fa-sign-out-alt"></i> SALIDA</a>
                    </li>
                </ul>
            </li>
            <li><a href="#" id="menu_usuario" class="text-white"><i class="fas fa-users"></i> USUARIOS</a>
            </li>
            <li><a href="#" id="menu_reporte"><i class="fas fa-chart-line"></i> REPORTE</a>
            </li>
        </ul>
    </nav>
  
    <script>
    $(document).ready(function() {
        $menu = $('#menu').find('ul').find('li');

        $menu.hover(function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideDown();
        }, function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideUp();
        });
    });
    </script>
</body>