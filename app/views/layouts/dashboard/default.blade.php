<!DOCTYPE html>
<html lang="en">
@include('includes.dashboard.header')
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
							class="icon-bar"></span><span class="icon-bar"></span>
						</button>
						<p class="brand-text">
							league <span>together</span>
						</p>
					</div>
					<div class="navbar-collapse collapse">

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">account
									<b class="caret"></b>
								</a>
								<i class="dropdown-arrow dropdown-arrow-inverse"></i>
								<ul class="dropdown-menu">
									<li>
										<div class="navbar-content">
											<div class="row">
												<div class="col-md-3">
													<span class="fa-stack fa-2x">
														<i class="fa fa-square-o fa-stack-2x"></i>
														<i class="fa fa-user fa-stack-1x "></i>
													</span>
												</div>
												<div class="col-md-9">
													<span>{{$user->firstname}} {{$user->lastname}}</span>
													<p class="text-muted small">
														{{$user->email}}</p>
														<div class="divider">
														</div>
														<a href="#" class="btn btn-info btn-xs active pull-right ">Edit Settings</a>
														<br>
													</div>
												</div>
											</div>
											<div class="navbar-footer">
												<div class="navbar-footer-content">
													<div class="row">
														<div class="col-md-6">
															<a href="#" class="btn btn-default btn-xs">Change Passowrd</a>
														</div>
														<div class="col-md-6">
															<a class="btn btn-default btn-xs pull-right" href="{{ URL::route('logout') }}">Logout</a>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
							</ul>

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									support |
								</a>

								</li>
							</ul>

						
						</div>
					</div>
				</div>
			</div>
		</nav>
		@yield('content')
		@include('includes.dashboard.footer')
		@yield('script')
	</body>
	</html>


