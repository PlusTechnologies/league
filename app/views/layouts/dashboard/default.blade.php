<!DOCTYPE html>
<html lang="en">
@include('includes.dashboard.header')
<body class="cbp-spmenu-push">

	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<div class="navi-header">
			<div class="image">
				{{HTML::image($user->avatar, $user->firstname, array('class'=>'img-circle','width'=>70));}}
			</div>
			<h3>{{$user->firstname}} {{$user->lastname}}</h3>
			<a href="" class="showLeft">
			<span class="special-character">&#183;</span>
				Close menu
			</a>
		</div>
			<h3>Main</h3>

			<a href="/dashboard/club" class="{{ HTML::smart_link('dashboard/club') }}">
				<i class="retinaicon-essentials-006"></i> Dashboard
			</a>

			<a href="/dashboard/settings">
				<i class="retinaicon-essentials-008"></i> Account Settings
			</a>
			{{Route::is('dashboard.club.index')}}
			@if(Route::is('dashboard.club.show') || 
				Route::is('dashboard.club.discount.index')|| 
				Route::is('dashboard.club.event.index')
			)
				<a href="{{URL::action('ClubController@show', $club->id)}}" class="{{HTML::smart_link('dashboard.club.show') }}">
             	 <i class="retinaicon-essentials-020"></i> Overview
            	</a>
	            <a href="#">
	              <i class="retinaicon-communication-006"></i> Teams
	            </a>
	            <a href="{{URL::action('EventoController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.event.index')}}">
	              <i class="retinaicon-essentials-092"></i> Events
	            </a>
	            <a href="#">
	              <i class="retinaicon-communication-023"></i> Communication
	            </a>
	            <a href="#">
	              <i class="retinaicon-design-078"></i> Accounting
	            </a>
	        	<a href="{{URL::action('DiscountController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.discount.index')}}">
		          	<i class="retinaicon-essentials-116"></i> Discounts
	        	</a>
        
			@endif
			


	</nav>

	<nav class="navbar navbar-default navbar-dashboard-top">
		<div class="container relative">
			<div class="navbar-brand-center">
				<div class="logo" style="background-image: url(http://leaguetogether.dev/images/league-together-logo.svg)">
					<a href="/"></a>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-01">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="/cart">
							<i class="cart retinaicon-finance-001"></i>
							@if(Cart::totalItems() <> 0)
							<span class="navbar-new">{{Cart::totalItems()}}</span>
							@endif
						</a>
					</li>
				</ul>
				@if(!Auth::check())
				<a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('signup') }}">Sign up</a>
				<a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('login') }}">Sign in</a>
				@else
				<a class="navbar-right btn btn-xs btn-primary nav-btn"href="{{ URL::route('logout') }}">Logout</a>
				<a id="showLeft" class="navbar-right btn btn-xs btn-primary nav-btn">Menu</a>
				@endif
			</div>
		</div>
	</nav>
	@yield('content')
	@include('includes.dashboard.footer')
	@yield('script')
</body>
</html>
<!-- <nav class="navbar navbar-default">
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
{{$user->email}}
</p>
<div class="divider"></div>
<a href="#" class="btn btn-info btn-xs active pull-right ">Edit Settings
</a>
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
</nav> -->


