<?php 

    class DB_Connect
    {
		//php8.0.28
		//php7.3.5
		//LoadModule php7_module "${INSTALL_DIR}/bin/php/php7.3.5/php7apache2_4.dll"
		//LoadModule php7_module "${INSTALL_DIR}/bin/php/php8.0.28/php8apache2_4.dll"
		public function Connect()
		{
			//$conn = mysqli_connect('localhost', 'root', 'bsV@1234Vsb', 'cclub_agents_club');
            $conn = mysqli_connect('localhost', 'cllubb_bright', 'bright@91mD#5', 'cllubb_agents_club');
				    mysqli_set_charset($conn,"utf8mb4") ;
		    return $conn ;
		}
		public function Close()
	    {
			mysqli_close() ;
	    }
	}
	class DB_Connct
    {
		
		public function Connect()
		{
			//$conn = mysqli_connect('localhost', 'root', 'bsV@1234Vsb', 'cclub_agents_club');
	        $conn = mysqli_connect('localhost', 'cllubb_bright', 'bright@91mD#5', 'cllubb_agents_club');
				    mysqli_set_charset($conn,"utf8mb4") ;
		    return $conn ;
		}
		public function Close()
	    {
			mysqli_close() ;
	    }
	}

?>