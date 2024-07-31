<?php 

    class DBFunctions
	{
		function __construct()
	      {
	          $data = true ;
	          require_once('connection.php') ;
              $database = new DB_Connect() ;	
              $db = $database->Connect() ;	
              $this->con = $db ;
	     }
	   function __destruct()
	     {
		
	     }
		
		
		public function CheckUser($userName,$userPass)
	    {
		    $query="select * FROM users WHERE userName='$userName' and userPass='$userPass'";
		    $data  = mysqli_query($this->con,$query);
		    return $data;
	    }
	public function newUser($name,$email,$pass,$roll,$date)
	{
		$query="insert into hoteladmins(userName,userEmail,userPass,userRoll)
		                    values('$name','$email','$pass','$roll')";
		$data  = mysqli_query($this->con,$query);					
		return $data;
	}
	public function showThisUser($email)
	{
		$query="select * FROM hoteladmins WHERE userEmail='$email'";
		$data  = mysqli_query($this->con,$query);
		return $data;
	}
	public function checkThisUser($email)
	{
		$query="select * FROM hoteladmins WHERE userEmail='$email'";
		$data  = mysqli_query($this->con,$query);
		$rows = $data->num_rows;
		return $rows;
	}
	
	public function userLogin($email,$pass)
	{
		$query="select * FROM hoteladmins WHERE userEmail='$email' and userPass='$pass'";
		$data  = mysqli_query($this->con,$query);
		return $data;
	}
		
		//////////////////////////////////// user Info ////////////////////////////////
		
		
		function userInfo($userId)
		{
			$query = mysqli_query($this->con,"SELECT * FROM hoteladmins WHERE userId='$userId'");
			$rows  = mysqli_fetch_array($query);
			return $rows;
		}
		
		//// edit User Info 
		function userInfoEdit($userId,$userName,$userPhone,$userPass)
		{
			$query = mysqli_query($this->con,"UPDATE users SET userFullName='$userName',userPhone='$userPhone',userPass='$userPass' WHERE userId='$userId'");
			return $query;
		}
		
		
		/////// data Operations //////
		
		function itemEdit($Agency_Name,$Country,$Activity,$First_Name,$Last_Name,$Full_Name,$Short_description,$City,$State,$ZIPCode,$Phone_Number,$Mob_Num,$Fax_Number,$Website,$TIMEZONE,$Longitude,$LATITUDE,$ZIPTYPE,$CITYTYPE,$COUNTYFIPS,$STATENAME,$STATEFIPS,$UTC,$Address,$Visibility,$Unique_ID)
		{
			$query = mysqli_query($this->con,"UPDATE atword_xl_db SET Country='$Country',Agency_Name='$Agency_Name',Activity='$Activity',
			First_Name='$First_Name',Last_Name='$Last_Name',Full_Name='$Full_Name',
            Short_description='$Short_description',Address='$Address',Phone_Number='$Phone_Number',City='$City',State='$State',ZIPCode='$ZIPCode',
            Mob_Num='$Mob_Num',Fax_Number='$Fax_Number',Website='$Website',TIMEZONE='$TIMEZONE',
            LONGITUDE='$Longitude',LATITUDE='$LATITUDE',ZIPTYPE='$ZIPTYPE',
            CITYTYPE='$CITYTYPE',COUNTYFIPS='$COUNTYFIPS',STATENAME='$STATENAME',
            STATEFIPS='$STATEFIPS',UTC='$UTC',Visibility='$Visibility' 			
			WHERE Unique_ID='$Unique_ID'");
			return $query;
		}
		
		function editDataImage($imgName,$imgID)
		{
			$query = mysqli_query($this->con,"UPDATE atword_xl_db SET image='$imgID' WHERE Unique_ID='$Unique_ID'");
			return $query;
			
		}
		
		function itemAddNew($Agency_Name_1,$Country_1,$Activity_1,$First_Name_1,$Last_Name_1,$Full_Name_1,$Short_description_1,$City_1,$State_1,$ZIPCode_1,$Phone_Number_1,$Mob_Num_1,$Fax_Number_1,$Website_1,$TIMEZONE_1,$Longitude_1,$LATITUDE_1,$ZIPTYPE_1,$City_TYPE_1,$COUNTYFIPS_1,$State_NAME_1,$State_FIPS_1,$UTC_1,$Address_1,$Visibility_1,$Unique_ID_1)
		{
			$query = mysqli_query($this->con,"insert INTO atword_xl_db(Agency_Name,Country,
			Activity,First_Name,Last_Name,Full_Name,Short_description,City,State,
			ZIPCode,Phone_Number,Mob_Num,Fax_Number,Website,TIMEZONE,LONGITUDE,LATITUDE,ZIPTYPE,
			CITYTYPE,COUNTYFIPS,STATENAME,STATEFIPS,UTC,Address,Visibility) values('$Agency_Name_1',
			'$Country_1','$Activity_1','$First_Name_1','$Last_Name_1','$Full_Name_1','$Short_description_1','$City_1','$State_1',
			'$ZIPCode_1','$Phone_Number_1','$Mob_Num_1','$Fax_Number_1','$Website_1',
			'$TIMEZONE_1','$Longitude_1','$LATITUDE_1','$ZIPTYPE_1','$City_TYPE_1',
			'$COUNTYFIPS_1','$State_NAME_1','$State_FIPS_1','$UTC_1','$Address_1','$Visibility_1')");
			return $query;
			
		}
		
		function itemDelete($Unique_ID)
		{
			$query = mysqli_query($this->con,"DELETE FROM atword_xl_db WHERE Unique_ID='$Unique_ID'");
			return $query;
		}
		function showMaxId()
		{
			$query = mysqli_query($this->con,"select Unique_ID as dt from atword_xl_db ORDER BY Unique_ID DESC LIMIT 1");
			$rows  = mysqli_fetch_assoc($query);
			return $rows['dt'];
		}
		
		////////////////////dash//////////////////
		function subscribedCountries()
		{
			$query = mysqli_query($this->con,"SELECT Unique_ID as dt FROM atword_xl_db GROUP BY Country");
			$rows  = $query->mysqli_num_rows;
			return $rows;
		}
		function subscribedUsers()
		{
			$query = mysqli_query($this->con,"SELECT count(*) as dt FROM users");
			$rows  = mysqli_fetch_assoc($query);
			return $rows['dt'];
		}
		
		function subscribedAgencies()
		{
			$query = mysqli_query($this->con,"SELECT Unique_ID as dt FROM atword_xl_db GROUP BY Agency_Name");
			$rows  = $query->mysqli_num_rows;
			return $rows;
		}
		function subscribedAgents()
		{
			$query = mysqli_query($this->con,"SELECT Unique_ID as dt FROM atword_xl_db GROUP BY Phone_Number");
			$rows  = $query->mysqli_num_rows;
			return $rows;
		}
		
		function subscribedCities()
		{
			$query = mysqli_query($this->con,"SELECT Unique_ID as dt FROM atword_xl_db GROUP BY City");
			$rows  = $query->mysqli_num_rows;
			return $rows;
		}
		
		function table_dash_1()
		{
			$query = mysqli_query($this->con,"SELECT * FROM atword_xl_db");
			return $query;
		}
		
		
	}



?>