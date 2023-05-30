
<?php
include('db.php');

?>


<!DOCTYPE html>
<html>

<head>
	<title>Student  System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body{
		margin:0 auto;
	background-color:#;
	

	}
	.container{
	width:100%;
	height:600px;
	border:1px solid blue;
display:flex;
	padding:20px 20px 20px 20px ;
	padding-right:50px;
			//background-color:rgb(105,143,255);
				//color:white;
	}
	a{
	text-declaration:non;
		color:white;
	}
	.contint1{
		width:100px;
	height:50px;
	border:1px solid blue;
	margin-left:20px;
	background-color:rgb(105,143,255);
	}
	.contint2{
		width:100px;
	height:50px;
	border:1px solid blue;
	margin-left:20px;
		background-color:rgb(105,143,255);
	}
	.contint3{
		width:100px;
	height:50px;
	border:1px solid blue;
	margin-left:20px;
		background-color:rgb(105,143,255);
	}
	.contint4{
		width:100px;
	height:50px;
	border:1px solid blue;
	margin-left:20px;
		background-color:rgb(105,143,255);
	}
	.contents{

    display: flex;
    align-items: center;
   justify-content: center;
    background: #f7f7f7;
    padding: 0 10px;


  }

 table{
	font-weight:blold;
	font-size: 20px;
	 margin-top:10px;
	 margin-left:120px;
	}
	 table caption{
	color: blue;
	font-weight:blold;
	font-size: 30px;
	padding-top:2px;
	padding-bottom:2px;
	}
	 table th{
	background: blue;
	color: #FFFFFF;
	font-weight:blold;
	}
	 table tr {
	height:40px;
	
	}
	 table tr  td{
	
	text-decoration: none ;
	padding: 7px 7px 7px 7px;
	border-radius: 5px 5px 5px 5px;
	
	}



form{
	 font-weight:bold; 
	 font-size: 16pt;
	 color: black;
	 
}

form. fieldset{ 
 font-weight:bold; 
border: blue solid 1px;

} 
.form-control{
height:35px;
width:200px;
pading:5px 5px 5p x5px;
border: blue solid 1px;
	border-radius: 15px 15px 15px 15px;




}
.btton{
  height:3.5rem;
  width: 12rem;
  background:blue;
  color:#fff;
  font-size: 1.7rem;
  text-transform: capitalize;
  border-radius: .5rem;
  cursor: pointer;
  position: relative;
  z-index: 0;
  overflow: hidden;
  margin:1rem 0;
}

.btton::before{
  content: '';
  position: absolute;
  top: -100%; 
  left: 0;
  height:100%;
  width: 100%;
  background:rgb(166, 166, 214);
  z-index: -1;
  transition: .2s linear;
}

.btton:hover:before{
  top: 0%;
}

.btton:hover{
  box-shadow: .1rem .5rem var(--blue),
              0 .3rem .5rem rgba(0,0,0,.3);
}



a:hover
{
border:2px solid red;
background: rgb(5, 68, 104);
color:white;
}
  .logo{
   height:150px;
  width: 100%;
  padding-top:50px;
  background-color:rgb(105,143,255);
				color:white;
					font-weight:blold;
	font-size: 30px;
  }
  h4{
  
  
  
  }
	</style>
</head>

<body>
<div class="logo">
<center>
					<h4>Delte student</h4>
				
			</center>
			</div>




<div class="tableBox" >
   <h1> student  List</h1> 
                                   <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Number student</th>
                                
                                            <th>Name student</th>
                                            <th>lastname</th>
                                            
											<th>fathername</th>
                                           <th>user_email</th>
										   <th>edit|delte</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                      
										  // $unique_id=$_SESSION['unique_id'];
											$r_q = "select * from card_activation "; 
                                            $r_res=mysqli_query($con,$r_q);

                                            $count=1;

                                            while($r_row=mysqli_fetch_assoc($r_res))
                                            {
                                                echo '<tr class="odd gradeX">
                                                          <td>'.$count.'</td>
                                                          <td>'.$r_row['user_phone'].'</td>
                                                        
                                                          <td>'.$r_row['user_first_name'].'</td>
														    <td>'.$r_row['lastname'].'</td>
															<td>'.$r_row['fathername'].'</td>
                                                          <td>'.$r_row['user_email'].'</td>';
                                                          
                                                          echo "<td><a href='edit.php?id=$r_row[student_no]'>  <button class='button'>edit</button></a>|  <a href='deletestudent.php?id=$r_row[student_no]' onclick='return confirmation();'> <button class='button'>Delte</button></a></td></tr>";
                                                 
                                                      
                                                $count++;
echo '																					<script>
function confirmation()
{
if(window.confirm("Are you sure delte an idia?"))
{
return true;
}
else
{
return false;
}
}
</script>';
   
                                            }

                                        ?>
                                  </tbody>
                                </table>
		<a class="btton" href="index.php">رجوع</a>

	    </div>
		<body>
		</html>