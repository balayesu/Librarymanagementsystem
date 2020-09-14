<?php

//index.php

include('database_connection.php');

$query = "
 SELECT * FROM task_list 
 WHERE user_id = '".$_SESSION["user_id"]."' 
 ORDER BY task_list_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
 <head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.list-group-item>.badge {
    float: right;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
*, ::after, ::before {
    box-sizing: border-box;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
*, ::after, ::before {
    box-sizing: border-box;
}
*, ::after, ::before {
    box-sizing: border-box;
}
*, ::after, ::before {
    box-sizing: border-box;
}
a.list-group-item, button.list-group-item {
    color: #555;
}
.list-group-item {
    font-size: 26px;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
a {
    color: #337ab7;
    text-decoration: none;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
}
body {
    margin: 0;
    font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
   .list-group-item
   {
    font-size: 26px;
   }
  </style>
 </head>
 <body>
  
  <br />
  <br />
  <div class="container">
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-9">
       <h3 class="panel-title">To-Read List</h3>
      </div>
      <div class="col-md-3">
       
      </div>
     </div>
    </div>
      <div class="panel-body">
       <form method="post" id="to_do_form">
        <span id="message"></span>
        <div class="input-group">
         <input type="text" name="task_name" id="task_name" class="form-control input-lg" autocomplete="off" placeholder="Title..." />&nbsp&nbsp
         <div class="input-group-btn">
          <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm" style="height: 35px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
         </div>
        </div>
       </form>
       <br />
       <div class="list-group">
       <?php
       foreach($result as $row)
       {
        $style = '';
        if($row["task_status"] == 'yes')
        {
         $style = 'text-decoration: line-through';
        }
        echo '<a href="#" style="'.$style.' " class="list-group-item" id="list-group-item-'.$row["task_list_id"].'" data-id="'.$row["task_list_id"].'">'.$row["task_details"].' <span class="badge" data-id="'.$row["task_list_id"].'">X</span></a>';
       }
       ?>
       </div>
      </div>
     </div>
  </div>
 </body>
</html>

<script>
 
 $(document).ready(function(){
  
  $(document).on('submit', '#to_do_form', function(event){
   event.preventDefault();

   if($('#task_name').val() == '')
   {
    $('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
    return false;
   }
   else
   {
    $('#submit').attr('disabled', 'disabled');
    $.ajax({
     url:"add_task.php",
     method:"POST",
     data:$(this).serialize(),
     success:function(data)
     {
      $('#submit').attr('disabled', false);
      $('#to_do_form')[0].reset();
      $('.list-group').prepend(data);
     }
    })
   }
  });

  $(document).on('click', '.list-group-item', function(){
   var task_list_id = $(this).data('id');
   $.ajax({
    url:"update_task.php",
    method:"POST",
    data:{task_list_id:task_list_id},
    success:function(data)
    {
     $('#list-group-item-'+task_list_id).css('text-decoration', 'line-through');
    }
   })
  });

  $(document).on('click', '.badge', function(){
   var task_list_id = $(this).data('id');
   $.ajax({
    url:"delete_task.php",
    method:"POST",
    data:{task_list_id:task_list_id},
    success:function(data)
    {
     $('#list-group-item-'+task_list_id).fadeOut('slow');
    }
   })
  });

 });
</script>