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
    
  <h3>Student Edit</h3>

<?php foreach($student_data as $data) { ?>

	{!! Form::open(['url' => route('student.editStudent'), 'role' => 'form', 'class' => 'form-horizontal']) !!}

    <input type="hidden" class="form-control" id="stdId" name="stdId" value="{{ $data->id }}">
    <div class="form-group">
      <label for="stdName">Name</label>
      <input type="text" class="form-control" id="stdName" name="stdName" placeholder="Enter name" value="{{ $data->name }}">
    </div>
    <div class="form-group">
      <label for="stdAddress">Address</label>
      <input type="text" class="form-control" id="stdAddress" name="stdAddress" aria-describedby="stdAddress" placeholder="Enter Address" value="{{ $data->Address }}">
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $data->email }}">      
    </div>
     <div class="form-group">
      <label for="dob">DOB</label>
      <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter DOB" value="{{ $data->DOB }}">
    </div>
    </br></br>
    <button type="submit" class="btn btn-primary">Submit</button>
  
  <?php } ?>
  {!! Form::close() !!}

  @if(Session::has('flash_message'))
      <div class="alert alert-success">
          {{ Session::get('flash_message') }}
      </div>
  @endif

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>