@extends('layouts.app')

@section('content')
<head>
	
	
	<link rel="stylesheet" href="">
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.adminTabs')
            <div class='tab-pane adminTab'>
				
					
					<div id="app">
						<article  v-for="($index, post) in allposts">
							<div class="panel">@{{ post.id }}</div>
							<div class="panel">@{{ post.post_meta_data.title }}</div>
							<div class="panel">@{{{  post.post_content }}} </div>
						</article>
					</div>

			</div>
		</div>
	</div>
</div>
<script src="{{ asset('../resources/assets/js/vuejs/vue.js') }}"></script>
<script src="{{ asset('../resources/assets/js/vuejs/vue-resource.min.js') }}"></script>
<script src="{{ asset('js/adminVue.js') }}"></script>

 @stop