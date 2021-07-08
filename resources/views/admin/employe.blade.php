@extends('admin.dashadmin')
@section('content')

			
			<!-- Page Wrapper -->
            
			
				<!-- Page Content -->
                <div style="margin-top:100px" class="content container">
			
					
				
					
					<div class="row staff-grid-row">
						@foreach ($livreurs as $livreur)
						<div class="col-md-3 col-sm-6 col-12 col-lg-3 col-xl-4">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="profile.html" class="avatar"><img src="uploads/avatars/{{$livreur->image}}" alt=""></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-pencil-o m-r-5"></i>show</a>
									</div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$livreur->name}}</a></h4>
								<div class="small text-muted">Livreur</div>
							</div>
						</div>
						@endforeach	
					</div>
				
                </div>
				<!-- /Page Content -->
				
		
				
	
				
          
			<!-- /Page Wrapper -->
@endsection
