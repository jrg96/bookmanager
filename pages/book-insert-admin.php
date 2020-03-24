    <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>New Book</h1>
				
				<div class="">
					<div class="card-header">
						<h4 class="card-title">Book information</h4>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="frmTitle" class="col-sm-12 control-label">Title</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="frmTitle" />
								</div>
							</div>
							
							<div class="form-group">
								<label for="frmDescription" class="col-sm-12 control-label">Description</label>
								<div class="col-sm-12">
									<textarea class="form-control" name="frmDescription"></textarea>
								</div>
							</div>
							
							<div class="col-sm-8 col-sm-offset-4">
								<button type="submit" name="listaction" value="process_book_insert" class="btn btn-success">Insert</button>
								<button type="submit" name="listaction" value="cancel_book_insert" class="btn btn-warning">Cancel</button>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
