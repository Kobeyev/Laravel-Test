@extends('layouts.header')

@section('title')Запросы@endsection

@section('content')

	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/contact.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<h3>Shop application</h3>
                                @if($user) <p>{{ $user->name }}</p> @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
