<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Llistat de Clients</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Gestió de Clients (Agrisoft)</h1>

    <?php
    // 1. Dades de connexió
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agrisoft_db";

    // 2. Crear connexió
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 3. Comprovar errors
    if ($conn->connect_error) {
        echo "<h3 style='color:red'>Error de connexió: " . $conn->connect_error . "</h3>";
    } else {
        
        // 4. Consulta
        $sql = "SELECT * FROM CLIENT";
        $result = $conn->query($sql);

        if (!$result) {
            echo "Error en la consulta SQL: " . $conn->error;
        } else {
            // 5. Mostrar Taula
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Tipus</th>
                        <th>Contacte</th>
                        <th>Direcció</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["idClient"] . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["tipus"] . "</td>";
                    echo "<td>" . $row["contacte"] . "</td>";
                    echo "<td>" . $row["direccio"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center'>No hi ha clients a la base de dades</td></tr>";
            }
            echo "</tbody></table>";
        }
        $conn->close();
    }
    ?>
    </body>
</html>