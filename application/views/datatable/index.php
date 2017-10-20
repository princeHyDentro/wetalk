<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php require_once(APPPATH."views/template/nav.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Employee Registration Form</li>
      </ol>
		<div class="container">
		    <div class="row">
			    <div class="col-md-12">

			    <h1>Book List</h1>

					<table id="book-table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td>Book Title</td>
								<td>Book Price</td>
								<td>Book Author</td>
								<td>Rating</td>
								<td>Publisher</td>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

			    </div>
		    </div>
		</div>
	</div>
</div>
 <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
