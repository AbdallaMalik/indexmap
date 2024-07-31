<?php session_start(); 

    ////////////
    class stDBCONST
	{
		function __construct()
        {
			$stWEBFICON  = "";
			$smURLPARENt = "";
			$stWEBFICON  = "";
			$stWEBLOGO   = "";
			$stWEBTITLE  = "";
			$stWEBZOOM   = "";
			$stWEBPANTO  = "";
			$stWEBLAYER  = "";
			
			$mdGMail       = "";
			$mdGCode       = "";
			$mdVUsion      = "false";
			$mdVUsionINf   = "false";
			$mdVUsionMAIL  = "false";
			$mdVUsionHASH  = "false";
			$mdVUsionReset = "false";
			
            // Initialise variables
            $this->smURLPARENt = "https://property.cllubb.com/";
            $this->smURLPATH   = "https://property.cllubb.com/indexmap/";
			
			//$this->smURLPARENt = "http://localhost/cclubb.com/property/";
            //$this->smURLPATH   = "http://localhost/cclubb.com/property/indexmap/";
			
            $this->stWEBFICON = $this->smURLPATH."assets/inAssets/t-logo.png";
            $this->stWEBLOGO  = $this->smURLPATH."assets/inAssets/logo.png";
			$this->stWEBTITLE = "PROPERTY INDEX MAP";
			
		
			$this->stWEBZOOM  = 12;
			$this->stWEBPANTO = "";
			$this->stWEBLAYER = "DARK MAP";

			if(isset($_SESSION['mCCLUBsValidUser']) != false)
		        $mdVUsion = $_SESSION['mCCLUBsValidUser'];

	        if(isset($_SESSION['mCCLUBsSinfo']) != false)
		        $mdVUsionINf = $_SESSION['mCCLUBsSinfo'];
	  
	        if(isset($_SESSION['mCCLUBsSemail']) != false)
		        $mdVUsionMAIL = $_SESSION['mCCLUBsSemail'];
	        
	        if(isset($_SESSION['mCCLUBsSemail_hash_code']) != false)
                $mdVUsionHASH = $_SESSION['mCCLUBsSemail_hash_code'];
	  
	        if(isset($_SESSION['mCCLUBsSemail_reset_code']) != false)
		        $mdVUsionReset = $_SESSION['mCCLUBsSemail_reset_code'];
	  
	        if(isset($_SESSION['mCCLUBsSemail_reset_password']) != false)
		        $mdVUsionReset = $_SESSION['mCCLUBsSemail_reset_password'];
	  
	          
			$this->mdVUsion      = $mdVUsion;
			$this->mdVUsionINf   = $mdVUsionINf;
			$this->mdVUsionMAIL  = $mdVUsionMAIL;
			$this->mdVUsionHASH  = $mdVUsionHASH;
			$this->mdVUsionReset = $mdVUsionReset;
			$this->mdGCode      = "CCLUBB";
			$this->mdGMail      = "info@cllubb.com";
			
		}
		
		function __destruct()
	    {
		
		}
		
		public function getmdVUsion($md)
        {
			$mdResult = "";
			
			if($md == "mdUser")
				$mdResult = $this->mdVUsion;
			elseif($md == "mdUINfo")
				$mdResult = $this->mdVUsionINf;
			elseif($md == "mdUMail")
				$mdResult = $this->mdVUsionMAIL;
			elseif($md == "mdUHash")
				$mdResult = $this->mdVUsionHASH;
			elseif($md == "mdUReset")
				$mdResult = $this->mdVUsionReset;
            elseif($md == "mdGCode")
				$mdResult = $this->mdGCode; 
            elseif($md == "mdGMail")
				$mdResult = $this->mdGMail;
				
            return $mdResult;
		}
		public function getsmURLPARENt()
        {
            return $this->smURLPARENt;
		}
		public function getsmURLPATH()
        {
            return $this->smURLPATH;
		}
		public function getstWEBFICON()
        {
            return $this->stWEBFICON;
		}
		public function getstWEBLOGO()
        {
            return $this->stWEBLOGO;
		}
		public function getstWEBTITLE()
        {
            return $this->stWEBTITLE;
		}
		
		
		public function getstWEBZOOM()
        {
            return $this->stWEBZOOM;
		}
		public function setstWEBZOOM($item)
        {
			$this->stWEBZOOM = $item;
            return $this->stWEBZOOM;
		}
		
		public function getstWEBPANTO()
        {
            return $this->stWEBPANTO;
		}
		public function setstWEBPANTO($item)
        {
			$this->stWEBPANTO = $item;
            return $this->stWEBPANTO;
		}
	
	    public function getstWEBLAYER()
        {
            return $this->stWEBLAYER;
		}
		public function setstWEBLAYER($item)
        {
			$this->stWEBLAYER = $item;
            return $this->stWEBLAYER;
		}
	
	}
	

?>