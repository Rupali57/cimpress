<html>
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-6">
		<form method="post" id="searchTag">
			
				Search by full name<input type="text" name="tags" id="tags" value="{{$full_name_input or ""}}"/>
				<input type="submit" name="search" value="search" />
			
		</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
	<table class= 'table' id="listingData">
	<thead>
		<tr>
			<td>Repo Id</td>
			<td>Full Name</td>
			<td>Url</td>
			<td>Issues count</td>
			<td>Description</td>
			<td>Added Date</td>
		</tr>
	</thead>
		<tbody>
			@forelse($results as $row)
				<tr>
				<td>{{$row['git_repo_id']}}</td>
				<td>{{$row['full_name']}}</td>
				<td>{{$row['url']}}</td>
				<td>{{$row['open_issues_cnt']}}</td>
				<td>{{$row['description']}}</td>
				<td>{{$row['created_at']}}</td>
				</tr>
			@empty
				<tr><td colspan="6">No Repository found</td></tr>
			@endforelse
		</tbody>
	</table>
	{{ $results->links() }}
	</div></div>
	</div>
	<script>
  var full_name_autocomplete = [];
  var datatable;
  $( function() {
	
	full_name_arr = <?php echo json_encode($full_name) ?>;
	for ( var i in full_name_arr) 
	{ full_name_autocomplete.push({ label: full_name_arr[i], value: full_name_arr[i]});
		
	}
    $( "#tags" ).autocomplete({
      source: full_name_autocomplete
    });
	$('form#searchTag').submit(function(e){
		if($("#tags").val()=="")
		{
			//return false;
		}
	});
	
  } );
  </script>

</body>

</html>