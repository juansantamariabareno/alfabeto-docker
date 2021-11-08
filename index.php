<?php 

require_once (__DIR__ . "/Config.php");
// phpinfo();
global $BaseDatos;
global $Password;
global $Usuario;
/**Recibe los parametros por GET */
$CodigoLetra = (isset($_GET['Numero']) && !empty($_GET['Numero'])) ? $_GET['Numero'] : die("Debe ingresar un parametro GET Ej: http://localhost:9090?Numero=3");

/**Se crea conexión a la base de datos */
global $Conexion;
$Conexion = mysqli_connect("$NombreServidor:$Puerto",$Usuario,$Password,$BaseDatos);
(!$Conexion) ? die("Error en conexión: ".mysqli_connect_error()) : '';
$CodigoLetra = intval($CodigoLetra);
(!is_numeric($CodigoLetra) || !is_integer($CodigoLetra) || $CodigoLetra > 27) ? die("Por favor ingrese un número entero válido entre 1 y 27") : '';
$Letra = ObtenerLetra($CodigoLetra);

echo "La letra del abecedario correspondiente al codigo ingresado es: ".$Letra;

function ObtenerLetra($CodigoLetra){
    global $Conexion;
    $Query = "select AbcLetra from abecedario where AbcId = $CodigoLetra";
    $Abc = mysqli_query($Conexion, $Query);
    while ($row = $Abc->fetch_assoc()) {
       $Letra = $row['AbcLetra'];
    }
    return $Letra;
}