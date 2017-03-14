<?php
$input=trim($_POST['input']);
$servername = "localhost";
$username = "tecshops_selectt";
$password = "Anabantha666";
$dbname = "tecshops_sanatorio_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$acentos = $conn->query("SET NAMES 'utf8'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo $input;
$sql = "select imagen, fecha, titulo, autor, especialidad, parte1, parte2, parte3, parte4, parte5, parte6, parte7, parte8, parte9, parte10, parte11, parte12, parte13, parte14, parte15, parte16, parte17, parte18, parte19, parte20 from blog where titulo LIKE '%".$input."%' OR autor like '%".$input."%'  OR especialidad like '%".$input."%' order by fecha desc";

$result = $conn->query($sql) or die('NO SE PUDO HACER LA CONSULTA');
if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()){
                       
                        $titulo=$row["titulo"];
                       
                        echo $titulo;
                          } } else {
    echo "0 results";
    }
 //header("Location:pruebas.php?".SID);



?>

