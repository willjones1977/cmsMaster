@extends('layouts.app')

@section('content')
<div class="container">
	<h3><?= $postMetaData->title; ?></h3>
	<?= $post->post_content; ?>
	
	
</div>


@stop