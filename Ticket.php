<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Autobús</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .ticket {
            width: 300px;
            padding: 20px;
            border: 1px solid #000;
            margin: auto;
        }
        .ticket h2 {
            text-align: center;
        }
        .ticket p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="ticket">
        <h2>Ticket de Autobús</h2>
        <p><strong>ID:</strong> 123456</p>
        <p><strong>Nombre:</strong> Juan Pérez</p>
        <p><strong>Origen:</strong> Ciudad A</p>
        <p><strong>Destino:</strong> Ciudad B</p>
        <p><strong>Fecha y Hora:</strong> 2024-04-30 08:00</p>
        <p><strong>Precio:</strong> $50.00</p>
        <p><strong>Tipo de Pago:</strong> Efectivo</p>
        <p><strong>Hora de Salida:</strong> 08:00</p>
    </div>

    <script>
        // Función para imprimir el ticket
        function imprimirTicket() {
            // Ocultar botón de impresión
            var imprimirBtn = document.getElementById('imprimirBtn');
            imprimirBtn.style.display = 'none';
            // Imprimir ticket
            window.print();
            // Mostrar botón de impresión nuevamente después de imprimir
            setTimeout(function(){
                imprimirBtn.style.display = 'inline-block';
            }, 100);
        }
    </script>

    <!-- Botón para imprimir el ticket -->
    <button id="imprimirBtn" onclick="imprimirTicket()">Imprimir Ticket</button>

</body>
</html>
