<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Banks List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<h1></h1>
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-9 col-md-9">
					<h1>Banks List
						<small>Click Banks to View Branches</small>
					</h1>
				</div>
				<div class="col-lg-3 col-md-3">
					<a href="<?php echo base_url('index.php/manage-branchs') ?>" class="btn btn-primary">Branch Manager >></a>
				</div>
			</div>

		</div>
		<div class="row">
			<div id="" class="col-md-12">
				<div class="panel-group" id="accordion">
					<?php
					if (!empty($banks_list)) {
						$cnt = 0;
						foreach ($banks_list as $bank) {
							$cnt++;
					?>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $cnt ?>">
											<?php echo $bank->bank_name ?>
										</a>
									</h4>
								</div>
								<div id="collapse-<?php echo $cnt ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table table-hover">
											<thead>
												<th>Branch Name</th>
												<th>Branch Code</th>
											</thead>
											<tbody>
												<?php
												if (!empty($branch_list)) {
													$count = 0;
													foreach ($branch_list as $row) {

														if ($row->bank_id == $bank->bank_id) {
															$count++;
												?>

															<tr>
																<td><?php echo $row->branch_name ?></td>
																<td><?php echo $row->branch_code ?></td>
															</tr>
												<?php
														}
													}
												}
												if ($count <= 0) {
													echo '<tr><td colspan="2"><div class="alert alert-warning">No Branches Yet!</div></td></tr>';
												}
												?>
											</tbody>
										</table>
									</div>

								</div>
							</div>
					<?php
						}
					}
					?>
				</div>
			</div>

		</div>
	</div>

</body>

</html>
