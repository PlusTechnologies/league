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

			<a href="/dashboard" class="{{ HTML::smart_link('dashboard') }}">
				<i class="retinaicon-essentials-006"></i> Dashboard
			</a>

			<a href="/dashboard/settings">
				<i class="retinaicon-essentials-008"></i> Account Settings
			</a>
			<!-- {{Route::is('dashboard.club.index')}} -->
			@if(Route::is('dashboard.club.show') || Route::is('dashboard.club.discount.index')|| Route::is('dashboard.club.event.index'))
				<a href="{{URL::action('ClubController@show', $club->id)}}" class="{{HTML::smart_link('dashboard.club.show') }}">
             	 <i class="retinaicon-essentials-020"></i> Overview
            	</a>
	            <a href="{{URL::action('TeamController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.team.index')}}">
	              <i class="retinaicon-communication-006"></i> Teams
	            </a>
	            <a href="{{URL::action('EventoController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.event.index')}}">
	              <i class="retinaicon-essentials-092"></i> Events
	            </a>
	            <a href="{{URL::action('CommunicationController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.communication.index')}}">
	              <i class="retinaicon-communication-023"></i> Communication
	            </a>
	            <a href="{{URL::action('AccountingController@index', $club->id)}}" class="{{ HTML::smart_link('dashboard.club.accounting.index')}}">
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
				<a href="/" class="logo" style="background-image: url(http://leaguetogether.dev/images/league-together-logo.svg)"></a>
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


