<?php 
	header('Access-Control-Allow-Origin: *; charset:utf-8');

	require ('Conexion.php');

	$conn = conn();
	mysqli_set_charset($conn,"utf8");

	//ENCRIPTAR ID POR GET
		//$hola="2";
		//$control= "*+-TODO ESTO NO VA";

		//$encriptar=$hola . $control;
		
		//echo "<br>";
		//$ver = base64_encode($encriptar);
		//echo $ver;
		//echo "<br>";
	
	//DESENCRIPTAR
		//$encriptar = base64_decode($_GET['id']);
		//echo "<br><br>";
		//$posicion_coincidencia = strpos($encriptar, '*+-');

		//	if ($posicion_coincidencia === false) {
		//		echo "NO se ha encontrado el id!!!!";
	//			} else {
						
	//					echo "<br>";
	//					echo substr($encriptar,0,$posicion_coincidencia) . "<br><br>";	
	//				}
			
	
	
	if (isset($_GET['subrubro'])) {
		if ($_GET['subrubro']=='1') {
			$query = mysqli_query($conn, "SELECT * FROM comercios WHERE id_rubro = 1 AND id_subrubro = 1 ORDER BY premium DESC");
	
			while($fila = mysqli_fetch_assoc($query)){
				//Guardo los resultados mapeados en el array creado
				$array[] = array_map('utf8_encode', $fila);
			}
			//Codifico el array anterior en una variable para que lo retorne
			$res = json_encode($array, JSON_UNESCAPED_UNICODE);
	
			echo (utf8_decode($res));
			
		}
		
		if ($_GET['subrubro']=='2') {
			$query = mysqli_query($conn, "SELECT * FROM comercios WHERE id_rubro = 1 AND id_subrubro = 2 ORDER BY premium DESC");
	
			while($fila = mysqli_fetch_assoc($query)){
				//Guardo los resultados mapeados en el array creado
				$array[] = array_map('utf8_encode', $fila);
			}
			//Codifico el array anterior en una variable para que lo retorne
			$res = json_encode($array, JSON_UNESCAPED_UNICODE);
	
			echo (utf8_decode($res));
			
		}
		
	}else{
	
		$query = mysqli_query($conn, "SELECT * FROM comercios ORDER BY premium DESC");

		while($fila = mysqli_fetch_assoc($query)){
			//Guardo los resultados mapeados en el array creado
			$array[] = array_map('utf8_encode', $fila);
			
		}

		$res = json_encode($array, JSON_UNESCAPED_UNICODE);
		
		
		echo (utf8_decode($res));
		
	}
		//Codifico el array anterior en una variable para que lo retorne
		

 ?>