<?php 
function OpenConnection()  
{  
	try  
	{  
		$serverName = "tcp:������.database.windows.net,1433";  
		$connectionOptions = array("Database"=>"DB��",  
			"Uid"=>"�������̵�", "PWD"=>"��й�ȣ");  
		$conn = sqlsrv_connect($serverName, $connectionOptions);  
		if($conn == false)  
			die(FormatErrors(sqlsrv_errors()));  
	}  
	catch(Exception $e)  
	{  
		echo("Error!");  
	}  
}  
?>