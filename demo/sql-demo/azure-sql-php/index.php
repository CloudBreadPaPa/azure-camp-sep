<?php 
function OpenConnection()  
{  
	try  
	{  
		$serverName = "tcp:서버명.database.windows.net,1433";  
		$connectionOptions = array("Database"=>"DB명",  
			"Uid"=>"유저아이디", "PWD"=>"비밀번호");  
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