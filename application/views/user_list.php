<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User List</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<!-- CSS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- page content -->
    <div style="text-align:right; font-size:18px; width:95%; margin-top:1%"><a href="https://stackfame.com/editable-html-table-using-javascript-jquery/" >Tutorial  | <a href="https://stackfame.com/">StackFAME Homepage</a></div>
 <br>
    
    
    <br>
    <div class="table-responsive col-md-10">

<table class="table table-bordered table-striped table-hover table-condensed  text-center" id="DyanmicTable">
	<thead>
		<tr>
			<th class="text-center">
				User Name
			</th>
			<th class="text-center">
				Email
			</th>
			
               <th class="text-center">
				Contact No
			</th>
			
		</tr>
	</thead>
	<tbody>
    

     <?php
          foreach ($users as $row) { ?>
		<tr>
         
			<td>
               <?php echo $row->username ?>
			</td>
			<td>
               <?php echo $row->email ?>
			</td>
			<td>
               <?php echo $row->phone ?>
			</td>
               <td>
               <a href="<?php echo base_url('Registeration/edit/' . $row->id); ?>"><button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button></a>
			</td>
               <td>
               <a href="<?php echo base_url('Registeration/delete/' . $row->id); ?>"><button type= "button" name="delete"  class="btn btn-danger btn-xs delete">Delete</button></a>
			</td>
		</tr>
          <?php } ?>
	
	
	</tbody>
</table>
</div>

    <!--JS Files-->

<script>
 $('#DyanmicTable').SetEditable({ $addButton: $('#addNewRow')});
</script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
