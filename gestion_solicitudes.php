<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicamentos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 6px;
            margin-right: 8px;
            font-size: 17px;
            border: none;
            border-bottom: 2px solid #ddd;
        }
        .search-container button {
            padding: 6px 10px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        .agregar-btn {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
        }
        .enviar-btn {
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 20px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }
        .cantidad {
            display: flex;
            align-items: center;
        }
        .cantidad button {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <input type="text" placeholder="Buscar medicamento..." id="searchInput">
        <button><i class="fa fa-search"></i></button>
    </div>
    <table id="medicamentosTable">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha de caducidad</th>
        <th>Cantidad disponible</th>
        <th>Cantidad requerida</th>
    </tr>

    <tr>
    <tbody>
    <?php
            include("controlador/conexion_med.php");
            $sql = "SELECT * FROM medicamentos";
            $query = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $fila['nombre'] ?></th>
                    <th scope="row"><?php echo $fila['descripcion'] ?></th>
                    <th scope="row"><?php echo $fila['fecha_caducidad'] ?></th>
                    <th scope="row"><?php echo $fila['cantidad'] ?></th>
                    <th scope="row">
                        <!--class="cantidad">-->
                        <button onclick="disminuirCantidad(this)">-</button>
                        <span id="cantidad3535">1</span>
                        <button onclick="aumentarCantidad(this)">+</button>
                        <button class="agregar-btn" onclick="agregarMedicamento(this, 'hola', 'pastilla', '2024-05-22', document.getElementById('cantidad3535').textContent)">Agregar</button>
                    </th>
                </tr>
            <?php
        }
    ?>
    
</table>



<h3>Medicamentos Seleccionados</h3>
<table id="medicamentosSeleccionados">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha de caducidad</th>
        <th>Cantidad</th>
    </tr>
</table>

<button class="enviar-btn">Enviar</button>

<script>
    // Función para aumentar la cantidad
    function aumentarCantidad(btn) {
        var cantidadSpan = btn.parentNode.querySelector('span');
        var cantidad = parseInt(cantidadSpan.textContent);
        cantidad++;
        cantidadSpan.textContent = cantidad;
    }

    // Función para disminuir la cantidad
    function disminuirCantidad(btn) {
        var cantidadSpan = btn.parentNode.querySelector('span');
        var cantidad = parseInt(cantidadSpan.textContent);
        if (cantidad > 1) {
            cantidad--;
            cantidadSpan.textContent = cantidad;
        }
    }

    // Función para agregar medicamento a la tabla de seleccionados
    function agregarMedicamento(btn, nombre, descripcion, fechaCaducidad, cantidad) {
        var tableBody = document.getElementById("medicamentosSeleccionados").getElementsByTagName("tbody")[0];
        var newRow = tableBody.insertRow();
        var nombreCell = newRow.insertCell(0);
        var descripcionCell = newRow.insertCell(1);
        var fechaCaducidadCell = newRow.insertCell(2);
        var cantidadCell = newRow.insertCell(3);

        nombreCell.textContent = nombre;
        descripcionCell.textContent = descripcion;
        fechaCaducidadCell.textContent = fechaCaducidad;
        cantidadCell.textContent = cantidad;
    }

    // Función para filtrar la tabla según la búsqueda
    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function() {
        var searchText = searchInput.value.toLowerCase();
        var tableRows = document.querySelectorAll('#medicamentosTable tr');

        for (var i = 1; i < tableRows.length; i++) {
            var row = tableRows[i];
            var rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>
</body>
</html>