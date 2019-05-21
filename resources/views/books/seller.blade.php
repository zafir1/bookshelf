<div class="card">
	<h5 class="card-header h4 font-weight-bold text-center">Seller Details</h5>
	<div class="card-body">
		<table class="table table-striped text-center">
			<tr>
				<td class="font-weight-bold">Seller: </td>
				<td>{{ $seller->name }}</td>
			</tr>
			<tr>
				<td class="font-weight-bold">Email: </td>
				<td>{{ $seller->email }}</td>
			</tr>
			<tr>
				<td class="font-weight-bold">Contact:</td>
				<td>{{ $seller->details->contact }}</td>
			</tr>
			<tr>
				<td class="font-weight-bold">College:</td>
				<td>{{ $seller->details->getCollege->name }}</td>
			</tr>
			<tr>
				<td class="font-weight-bold">Location:</td>
				<td>{{ $seller->details->getLocation->name }}</td>
			</tr>
		</table>
	</div>
</div>