<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <a href="{!! route('student.addStudentView') !!}" class="btn btn-xs btn-warning"><i class="fa fa-fw fa-info-circle"></i>Add New Student</a>   

	<table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
		<?php           
          foreach($student_details as $data) { ?>
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->Address }}</td>
              <td>{{ $data->email }}</td>
              <td>
                 <a href="{!! route('student.editStudentView',['id'=>$data->id]) !!}" class="btn btn-xs btn-warning"><i class="fa fa-fw fa-info-circle"></i>Edit</a>               
              </td>
              <td>
                 <a href="{!! route('student.deleteStudent',['id'=>$data->id]) !!}" class="btn btn-xs btn-warning"><i class="fa fa-fw fa-info-circle"></i>Delete</a>               
              </td>
            </tr> 
         <?php }?>              
		</table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>