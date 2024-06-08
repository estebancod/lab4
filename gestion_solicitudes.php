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
        tr:nth-child(even) {
            background-color: #ffffff;
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
        .agregar-btn, .extra-btn {
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
        .selected-title {
            text-align: center;
            font-size: 24px;
            color: #2c3e50;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <input type="text" placeholder="Buscar medicamento..." id="searchInput">
        <button><i class="fa fa-search"></i></button>
    </div>
    <table id="medicamentosTable">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de caducidad</th>
            <th>Cantidad disponible</th>
            <th>Cantidad requerida</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include("controlador/conexion_med.php");
        $sql = "SELECT * FROM medicamentos";
        $query = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $fila['nombre'] ?></td>
                    <?php $names = $fila['nombre'] ?>
                    <td><?php echo $fila['descripcion'] ?></td>
                    <td><?php echo $fila['fecha_caducidad'] ?></td>
                    <td class="cantidad-disponible"><?php echo $fila['cantidad'] ?></td>
                    <td class="cantidad">
                        <button onclick="disminuirCantidad(this)">-</button>
                        <span class="cantidad-value">1</span>
                        <button onclick="aumentarCantidad(this)">+</button>
                        <button class="agregar-btn" onclick="agregarMedicamento(this, '<?php echo $names; ?>', '<?php echo $fila['descripcion']; ?>', '<?php echo $fila['fecha_caducidad']; ?>', this.parentNode.querySelector('.cantidad-value').textContent)">Agregar</button>
                        <button class="extra-btn">C</button>
                        <button class="extra-btn">P</button>
                    </td>
                </tr>
            <?php
        }
    ?>
    </tbody>
    </table>

    <h3 class="selected-title">Medicamentos Seleccionados</h3>
    <table id="medicamentosSeleccionados">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de caducidad</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>

    <button class="enviar-btn" onclick="enviarMedicamentos()">Enviar</button>

    <script>
        // Función para aumentar la cantidad
        function aumentarCantidad(btn) {
            var cantidadSpan = btn.parentNode.querySelector('.cantidad-value');
            var cantidad = parseInt(cantidadSpan.textContent);
            cantidad++;
            cantidadSpan.textContent = cantidad;
        }

        // Función para disminuir la cantidad
        function disminuirCantidad(btn) {
            var cantidadSpan = btn.parentNode.querySelector('.cantidad-value');
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

            // Disminuir la cantidad disponible en la tabla de arriba
            var filaMedicamento = btn.parentNode.parentNode;
            var cantidadDisponibleCell = filaMedicamento.querySelector('.cantidad-disponible');
            var cantidadDisponible = parseInt(cantidadDisponibleCell.textContent);
            cantidadDisponible -= parseInt(cantidad);
            cantidadDisponibleCell.textContent = cantidadDisponible;
        }

        // Función para filtrar la tabla según la búsqueda
        var searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            var searchText = searchInput.value.toLowerCase();
            var tableRows = document.querySelectorAll('#medicamentosTable tbody tr');

            for (var i = 0; i < tableRows.length; i++) {
                var row = tableRows[i];
                var rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        // Función para enviar medicamentos y limpiar la tabla
        function enviarMedicamentos() {
            var tableBody = document.getElementById("medicamentosSeleccionados").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = ''; // Limpiar la tabla de medicamentos seleccionados
            alert('Medicamentos enviados con éxito'); // Mensaje de confirmación
        }
    </script>
</body>
</html>
