<?php 

    
	
    class stDBss
	{
		
		function __construct()
	    {
	        $data = true ;
	        require_once('config.php') ;
            $database = new DB_Connect() ;	
            $db = $database->Connect() ;	
            $this->con = $db ;
	    }
	    function __destruct()
	    {
		
		}
		
		public function getsmCONNECT()
        {
            return $this->con;
		}
		
		public function mdTBconnect($mdUsr,$mdPass,$mdDBs)
        {
			$mdTBconct = array(
                            'user' => $mdUsr,
                            'pass' => $mdPass,
                            'db'   => $mdDBs,
                            'host' => 'localhost',
	                        'charset'=>'utf8mb4'
                        );
			
            return $mdTBconct;
		}
		
		function CheckDATA($tv,$tb,$tw)
	    {
		    $query="SELECT $tv 
 			        FROM $tb 
					WHERE 1 ".$tw;
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		function ChckDATaG($tw)
	    {
		    $query="SELECT tb_IndexmaPs.InID as InID,
			               tb_IndexmaPs.InPID as InPIDs,
						   count(*) as no,
			               tb_index_parent.InPID as InPID,
						   tb_index_parent.InPLAT as InPLAT,
						   tb_index_parent.InPLNG as InPLNG,
						   tb_index_parent.InPName as InPName,
						   tb_index_parent.InPCountry as InPCountry,
						   tb_index_parent.InPAddress as InPAddress,
						   tb_index_parent.InPNO as InPNO,
						   tb_index_parent.InPKEY as InPKEY
					FROM tb_index_parent
					LEFT JOIN tb_IndexmaPs 
				         ON tb_index_parent.InPID=tb_IndexmaPs.InPID
					WHERE 1 ".$tw;
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		
		function CheckDATAa($query)
	    {
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		
		function CreateDATA($tb)
	    {
		    $query="INSERT INTO $tb ";
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		
		function UPDateDATA($tb,$tv,$tw)
	    {
		    $query="UPDATE $tb SET $tv WHERE 1".$tw;
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		
		function DELEteDATA($tb,$tw)
	    {
		    $query="DELETE FROM $tb WHERE 1".$tw;
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		
		function defSDLnks()
		{
			global $stDBss;
			$tb = " tb_IndexmaPs ";
	        $tv = " count(*) as marks , InCountry ";
	        $tw = " AND InCountry !='' 
			        GROUP BY InCountry 
	                ORDER BY marks 
			        DESC LIMIT 20 ";
	
	        $CheckDATA = $stDBss->CheckDATA($tv,$tb,$tw);
		    while($astROWs = mysqli_fetch_assoc($CheckDATA))
		    {
			    $astInCountry = $astROWs['InCountry'];
			    $astInMarks   = $astROWs['marks'];
			
			    ?>
			    <a href="javascript:void(0)" class="defSDLnk astFlex btn" fm="InCountry" id="<?php echo $astInCountry;?>" 
				                             onclick="defSDLinks(this)">
			        
					<b nowrap><?php  echo $astInCountry;?></b>
				</a>	
				
			<?php
			}
		}
		
		function CheckPRICesD($tv,$tw)
		{
			global $stDBss;
			 
			$tb        = " tb_IndexmaPs ";
			$CheckDATA = $stDBss->CheckDATA($tv,$tb,$tw);
			$asROWS    = mysqli_fetch_assoc($CheckDATA);
			
			return $asROWS;
		}
	
	    /////////////
		function mdAcustTOvisitors($userID,$userMail)
	    {
		    $res   = "";
	        $edt   = "SELECT ID,is_user_type			
	                  FROM tb_users
	                  WHERE ID='$userID' ";
	        $query = mysqli_query($this->con,$edt);	
            $rows  = mysqli_fetch_assoc($query);

 		    $vUsrTYPe  = $rows['is_user_type'];
		    $mtv  = "SELECT * 			
	                 FROM tb_visitors
	                 WHERE userId='$userID' ";
	        $mQuerY = mysqli_query($this->con,$mtv);	
            if(mysqli_num_rows($mQuerY) > 0)
		    {
				
			}
		    else
		    {
			    $mediam  = "INSERT INTO tb_visitors(userId,userMail,vUsrTYPe)
                            VALUES('$userID','$userMail','$vUsrTYPe')";
	            $mediaMG = mysqli_query($this->con,$mediam);	
			}
		
		    return $res;
		}
	
	    function mdtvMaGazines($userID,$userName)
        {
		    $res   = "";
	        $edt   = "SELECT ID,is_user_type			
	                  FROM tb_users
	                  WHERE ID='$userID' ";
	        $query = mysqli_query($this->con,$edt);	
            $rows  = mysqli_fetch_assoc($query);

 		    $isUserTYPe = $rows['is_user_type'];
		    if($isUserTYPe == "MediaJv")
		    {
			    $edta   = "SELECT * 			
	                       FROM tb_tv_magazines
	                       WHERE tvUser='$userID' 
					             AND tvTYPe='mediajv' ";
	            $querya = mysqli_query($this->con,$edta);	
                if(mysqli_num_rows($querya) > 0)
			    {
				
				}
			    else
			    {
                    $mediaJv = "INSERT INTO tb_tv_magazines(tvUser,tvTYPe,tvName,tvStatus)
                                VALUES('$userID','mediajv','$userName','1')";
	                $mediaQ  = mysqli_query($this->con,$mediaJv);	
				}
			}
		
		    $etv   = "SELECT * 			
	                  FROM tb_tv_magazines
	                  WHERE tvUser='$userID' 
				            AND tvTYPe='tv' ";
	        $tvQuerY = mysqli_query($this->con,$etv);	
            if(mysqli_num_rows($tvQuerY) > 0)
		    {
				
			}
		    else
		    {
			    $mediaTv = "INSERT INTO tb_tv_magazines(tvUser,tvTYPe,tvName,tvStatus)
                        VALUES('$userID','tv','$userName','1')";
	            $mediaT  = mysqli_query($this->con,$mediaTv);	
			}	
		
		
		    ///////////////
		    $mtv   = "SELECT * 			
	                  FROM tb_tv_magazines
	                  WHERE tvUser='$userID' 
				            AND tvTYPe='magazine' ";
	        $mQuerY = mysqli_query($this->con,$mtv);	
            if(mysqli_num_rows($mQuerY) > 0)
		    {
				
			}
		    else
		    {
			    $mediam  = "INSERT INTO tb_tv_magazines(tvUser,tvTYPe,tvName,tvStatus)
                            VALUES('$userID','magazine','$userName','1')";
	            $mediaMG = mysqli_query($this->con,$mediam);	
			}	
		
		
		    ///////////////
		    $mtva   = "SELECT * 			
	                   FROM tb_users_acks
	                   WHERE aUserId='$userID' 
				       AND aAcctHTYPe='promote' ";
	        $mQuerYa = mysqli_query($this->con,$mtva);	
            if(mysqli_num_rows($mQuerYa) > 0)
		    {
				
			}
		    else
		    {
			    $mediama  = "INSERT INTO tb_users_acks(aUserId,aAcctHName,aAcctHTYPe)
                             VALUES('$userID','$userName','promote')";
	            $mediaMGa = mysqli_query($this->con,$mediama);	
			}	
		
	        return $res;
		}
	}

	class stDBexTRas
	{
		
		function __construct()
	    {
	        $data = true ;
	        require_once('config.php') ;
            $database = new DB_Connct() ;	
            $db = $database->Connect() ;	
            $this->con = $db ;
	    }
	    function __destruct()
	    {
		
		}
		
		function CheckDATA($tv,$tb,$tw)
	    {
		    $query="SELECT $tv 
 			        FROM $tb 
					WHERE 1 ".$tw;
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
		function CheckCURRencies()
	    {
			GLOBAL $stDBexTRas;
			$tv = " * ";
			$tb = " tb_indexskeys ";
			$tw = " AND indexTYPE='Last' ";
			$CheckDATA = $stDBexTRas->CheckDATA($tv,$tb,$tw);
			$indexREs = "";
			while($stROWS = mysqli_fetch_assoc($CheckDATA))
			{
				$indexKey   = $stROWS['indexKey'];
				$indexValue = $stROWS['indexValue'];
				$indexREs .='<option value="'.$indexValue.'" currencsYmbol="'.$indexKey.'">'.$indexKey.'</option>';
			}
			
			return $indexREs;
	    }
		
		function CheckCURRencYs($InKey)
	    {
			GLOBAL $stDBexTRas;
			$indexValue = "USD";
			
			$tv = " * ";
			$tb = " tb_indexskeys ";
			$tw = " AND indexTYPE='Last' 
			        AND indexKey='$InKey' ";
			$CheckDATA = $stDBexTRas->CheckDATA($tv,$tb,$tw);
			$stROWS = mysqli_fetch_assoc($CheckDATA);
			$indexValue = $stROWS['indexValue'];
			
			return $indexValue;
	    }
		
	}

	
	
	
?>