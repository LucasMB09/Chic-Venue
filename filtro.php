<!DOCTYPE html>
<html>
<head>
    <title>Filtro</title>
</head>
<body>
    <header>
        <div>
            <a href="index.php" class="logo">CHIC VENUE</a>
        </div>
        <nav>
            <ul>
                <div id="filtro-form">
                    <label for="color">Color</label>
                    <select id="color">
                      <option value="todos">Todos</option>
                      <option value="verde">Verde</option>
                      <option value="azul">Azul</option>
                      <option value="blanco">Blanco</option>
                      <option value="negro">Negro</option>
                      <option value="rosa">Rosa</option>
                      <option value="café">Café</option>
                      <option value="morado">Morado</option>
                    </select>
                    
                    <label for="talla">Talla</label>
                    <select id="talla">
                      <option value="todas">Todas</option>
                      <option value="xs">XS</option>
                      <option value="s">S</option>
                      <option value="m">M</option>
                      <option value="l">L</option>
                      <option value="xl">XL</option>
                    </select>
                    
                    <label for="precio">Precio</label>
                    <select id="precio">
                      <option value="ninguno">Ninguno</option>
                      <option value="ascendente">Del más barato al más caro</option>
                      <option value="descendente">Del más caro al más barato</option>
                    </select>
                    
                    
                    <input type="checkbox" id="ofertas">
                    <label for="ofertas">Mostrar solo ofertas/descuentos</label>
                    
                    
                    <button type="button" id="filtrar-btn">Filtrar</button>
                  </div>
                    
                  <script src="script.js"></script>
            </ul>
        </nav>
    </header>

    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var header = document.querySelector("header");
            header.classList.toggle("abajo",window.scrollY>0);
        })
    </script>
</body>
</html>