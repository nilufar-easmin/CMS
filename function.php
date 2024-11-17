<?php

	function court_type_list()
	{
		include('connection.php');
		$sql = 'select * from court_type order by court_type_id asc';
		$result = $conn->query($sql);
		$court_type_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$court_type_id = $row['court_type_id'];
			$court_type_name = $row['court_type_name'];
			$court_type_array[$court_type_id] = $court_type_name; 
		}
		return $court_type_array;
	}





	function case_type_list()
	{
		include('connection.php');
		$sql = 'select * from case_type order by case_type_id  asc';
		$result = $conn->query($sql);
		$case_type_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$case_type_id = $row['case_type_id'];
			$case_type_name = $row['case_type_name'];
			$case_type_array[$case_type_id] = $case_type_name; 
		}
		return $case_type_array;
	}


	function case_status_type_list()
	{
		include('connection.php');
		$sql = 'select * from case_status order by case_status_id  asc';
		$result = $conn->query($sql);
		$case_status_type_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$case_status_id  = $row['case_status_id'];
			$case_status_name = $row['case_status_name'];
			$case_status_type_array[$case_status_id] = $case_status_name; 
		}
		return $case_status_type_array;
	}



	function lawyer_list()
	{
		include('connection.php');
		$sql = 'select * from  lawyer_info order by lawyer_id  asc';
		$result = $conn->query($sql);
		$lawyer_list_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$lawyer_id  = $row['lawyer_id'];
			$lawyer_name = $row['lawyer_name'];
			$lawyer_list_array[$lawyer_id] = $lawyer_name ; 
		}
		return $lawyer_list_array;
	}

	function court_name_list()
	{
		include('connection.php');
		$sql = 'select * from  court_info order by court_id  asc';
		$result = $conn->query($sql);
		$court_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$court_id  = $row['court_id'];
			$court_name = $row['court_name'];
			if($row['court_name']!='')
			{
				$court_array[$court_id] = $court_name ; 
			}
			
		}
		return $court_array;
	}

	function justice_name_list()
	{
		include('connection.php');
		$sql = 'select * from  court_info order by court_id  asc';
		$result = $conn->query($sql);
		$justice_name_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$court_id  = $row['court_id'];
			$justice_name = $row['justice_name'];
			if($row['justice_name']!='')
			{
				$justice_name_array[$court_id] = $justice_name ; 
			}
			
		}
		return $justice_name_array;
	}

	function case_no_list()
	{
		include('connection.php');
		$sql = 'select * from  case_details order by case_details_id asc';
		$result = $conn->query($sql);
		$case_no_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$case_details_id  = $row['case_details_id'];
			$case_no = $row['case_no'];
			if($row['case_no']!='')
			{
				$case_no_array[$case_details_id] = $case_no ; 
			}
			
		}
		return $case_no_array;
	}


	function user_list()
	{
		include('connection.php');
		$sql = 'select * from   tbl_user order by UserID asc';
		$result = $conn->query($sql);
		$UserID_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$UserID   = $row['UserID'];
			$UserName = $row['UserName'];
			if($row['UserName']!='')
			{
				$UserID_array[$UserID] = $UserName ; 
			}
			
		}
		return $UserID_array;
	}


	function role_list()
	{
		include('connection.php');
		$sql = 'select * from  tbl_role_info order by RoleID   asc';
		$result = $conn->query($sql);
		$RoleName_array = array();
		while($row = mysqli_fetch_array($result))
		{
			$RoleID   = $row['RoleID'];
			$RoleName = $row['RoleName'];
			if($row['RoleName']!='')
			{
				$RoleName_array[$RoleID ] = $RoleName ; 
			}
			
		}
		return $RoleName_array; ;
	}
	
	


?>