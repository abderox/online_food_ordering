@extends('admin.dashadmin')
@section('content')
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/monstyle.css">
<style>
	.table thead th {
		font-size: 20px;
	}
	.heading-section {
		font-size: 40px;
	}
	.table tbody td.status .off:after {
    background: #b60e0e;
}

}
</style>
	
	
		<div class=" container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Delivery guys status</h2>
				</div>
			</div>
			<div class="row">
				<div class=" col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-md">
						  <thead>
						    <tr>
						      <th>&nbsp;</th>
						      <th>Email</th>
						      <th>Nom</th>
						      <th>Prenom</th>
							  <th>Status</th>
							  <th>history</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
							  @foreach ($demandes_livreurs as $demandes_livreur)
								  
							 
						    <tr class="alert" role="alert">
						    	<td>
						    		{{-- <label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label> --}}
						    	</td>
						      <td class="d-flex align-items-center">
								 
						      	<div class="img" style="background-image: url(uploads/avatars/{{$demandes_livreur->image}});"></div>
						      	<div class="pl-3 email">
						      		<span>{{$demandes_livreur->email}}</span>
						      		<span>Added: {{$demandes_livreur->created_at}}</span>
						      	</div>
						      </td>
						      <td>{{$demandes_livreur->name}}</td>
							  <td>{{$demandes_livreur->prenom}}</td> 

							  @if($demandes_livreur->work_stat==1)

						      <td class="status"><span class="active">duty</span></td>

							  @elseif($demandes_livreur->work_stat==0)
							  <td class="status"><span style="background-color: rgba(151, 44, 44, 0.287); color:#b60e0e" class="off waiting">Off</span></td>
							  @elseif($demandes_livreur->work_stat==2)
							  <td class="status"><span class="waiting">waiting</span></td>
							  @endif

							  <td>
								  <a href="../livorders/{{$demandes_livreur->id}}" class="btn btn-dark">show</a>
							  </td>
							    <td></td>
						
						
						      {{-- <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td> --}}
						    </tr>
							@endforeach
						  
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

@endsection

