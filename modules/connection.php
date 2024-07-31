<?php 

class DB_Connect
  {
		
		public function Connect()
		{
			//$conn = mysqli_connect("localhost","root","bsV@1234Vsb","tutorial");
			$conn = mysqli_connect("localhost","at_monear","t^^0N0et,*?-","at_agents_m");
				    mysqli_set_charset($conn,"utf8mb4") ;
		    return $conn ;
		}
		public function Close()
	    {
				 mysqli_close() ;
	    }
  }

?>