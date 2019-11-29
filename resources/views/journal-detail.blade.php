@extends('layout')

@section('content')

	<div class="journal pad-global">
		<div class="container">
			<div class="text-left back">
				<a href="{{ URL::to('/journal') }}">Back to Journal Home </a>
			</div>
			<div class="text-center">
				<div class="t1">Lorem Ipsum Dolor Sit Amet</div>
				<div class="dt">01 January 1970 / WRITTEN BY AUTHOR / IN STYLES, INSPIRATION</div>
				<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				<div class="row">
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						<div class="bdy">
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br />
							<p> Eget aliquet nibh praesent tristique magna sit. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Nunc lobortis mattis aliquam faucibus purus in massa tempor nec. Arcu non odio euismod lacinia. Dui id ornare arcu odio ut sem nulla. Enim eu turpis egestas pretium aenean pharetra magna ac. Facilisi nullam vehicula ipsum a. Id neque aliquam vestibulum morbi blandit cursus risus at ultrices. Aliquet eget sit amet tellus. Pellentesque dignissim enim sit amet venenatis urna. Facilisis mauris sit amet massa vitae tortor condimentum lacinia. Sit amet consectetur adipiscing elit pellentesque. Ut diam quam nulla porttitor massa id. Vitae ultricies leo integer malesuada nunc vel risus. </p> <br />
							<p> Aliquam purus sit amet luctus venenatis lectus. Leo vel orci porta non. Senectus et netus et malesuada fames. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Amet porttitor eget dolor morbi non arcu. Vestibulum mattis ullamcorper velit sed. Orci eu lobortis elementum nibh. Faucibus turpis in eu mi bibendum neque egestas. Velit egestas dui id ornare arcu odio ut sem. Sed risus pretium quam vulputate dignissim suspendisse. Metus vulputate eu scelerisque felis imperdiet.</p>
						</div>
					</div>
				</div>
				<div class="clearfix">
					<div class="float-left">
						<div class="box-arrow">
							<a href="{{ URL::to('/journal-detail') }}">
								<div class="link-title text-left"> OLDER POST </div>
								<div class="link-desc text-left"> Lorem Ipsuum Dolor Sit Aneque egestas. Velit egestas dui id ornare arcu odio ut sem.  </div>
							</a>
						</div>
					</div>
					<div class="float-right">
						<div class="box-arrow">
							<a href="{{ URL::to('/journal-detail') }}">
								<div class="link-title text-right"> NEWER POST </div>
								<div class="link-desc text-right"> Sed risus pretium quam vulpu ornare arcu odio </div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection