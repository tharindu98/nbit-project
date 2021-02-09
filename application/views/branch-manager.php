<?php
defined('BASEPATH') or exit('No direct script access allowed');
//var_dump($banks_list);exit;
if (!empty($saved_status)) {
	$this->load->helper('url');
	redirect(base_url() . 'index.php/manage-branchs');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Branch Manager</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
	<h1></h1>
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-9 col-md-9">
					<h1>Branch Manager
						<small>Click Banks to View Branches</small>
					</h1>
				</div>
				<div class="col-lg-3 col-md-3 mt-3">
					<a href="<?php echo base_url('index.php/home') ?>" class="btn btn-success">Go To Website >></a>
				</div>
			</div>

		</div>
		<div class="row mt-5">
			<div id="" class="col-md-12">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Add Branches
				</button>
				<table class="table table-hover">
					<thead>
						<th>Bank Name</th>
						<th>Branch Name</th>
						<th>Branch Code</th>
						<th>Edit</th>
						<!-- <th>Delete</th> -->
					</thead>
					<tbody>
						<?php
						if (!empty($branch_list)) {
							foreach ($branch_list as $branch) {
						?>
								<tr>
									<td><?php echo $branch->bank_name ?></td>
									<td><?php echo $branch->branch_name ?></td>
									<td><?php echo $branch->branch_code ?></td>
									<td><button class="btn btn-warning" onclick="editBranch(<?php echo $branch->id ?>)">Edit</button></td>
									<!-- <td><button class="btn btn-danger" onclick="deleteBranch(<?php //echo $branch->id 
																									?>)">Delete</button></td> -->
								</tr>
						<?php	}
						} else {
							echo '<tr><td colspan="4"><div class="alert alert-danger alert-dismissible fade show">No Data Available!. please Add Branches</div></td>';
						}
						?>

					</tbody>
				</table>
			</div>

		</div>
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form class="form-horizontal" id="branch-form" method="POST" action="<?php echo base_url() ?>index.php/add-branch/">
				<div class="modal-content">
					<div class="modal-header">

						<h4 class="modal-title">Add a new Branch</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="exampleSelect1" class="col-2 col-form-label">Select Bank</label>
							<div class="col-10">
								<select class="form-control" id="bank_select" name="bank" required>
									<option value="">- Select a Bank -</option>
									<?php foreach ($banks_list as $row) { ?>
										<option value="<?php echo $row->bank_id ?>"><?php echo $row->bank_name . ' | ' . $row->bank_code ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="example-text-input" class="col-2 col-form-label">Branch Name</label>
							<div class="col-10">
								<input class="form-control" type="text" name="name" value="" id="branch_name" required placeholder="Enter Branch Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="example-number-input" class="col-2 col-form-label">Branch Code</label>
							<div class="col-10">
								<input class="form-control" type="text" name="code" value="" id="branch_code" required placeholder="Enter Branch Code">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="action" value="" name="action">
						<input type="hidden" id="update_id" value="" name="update_id">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button id="submit" class="btn btn-primary">Save</button>
					</div>
				</div><!-- /.modal-content -->
			</form>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<script>
		$(document).ready(function() {

		});

		function editBranch(id) {
			var user_id = id;
			//	alert(user_id);
			//$('#exampleModal').modal('show');
			$.ajax({
				url: "<?php echo base_url("index.php/edit_branches"); ?>",
				method: "POST",
				data: {
					user_id: user_id
				},
				dataType: "json",
				success: function(data) {
					$('#exampleModal').modal('show');
					$('#branch_name').val(data[0].branch_name);
					$('#branch_code').val(data[0].branch_code);
					$("#bank_select").val(data[0].bank_id);
					$('#update_id').val(data[0].id);
					$('#action').val("edit");
				}
			})
		}
	</script>
</body>

</html>
