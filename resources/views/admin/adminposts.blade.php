@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
    	<div class="col-md-12">
    		@include('admin.adminTabs')
    		<div class="tab-pane adminTab">
				<!-- Tab Pane Header -->
				<div class="clearfix" style="">
					<div class="pull-right" style="color: #C00">
						<!-- ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-= -->
						<!-- Pagination -->
						<?php
							echo "<ul class='pagination paginationLinks' style='margin: 0px'>";
									if($page_number != 1):
										$previousPage = $page_number - 1;
										$nextPage = $page_number + 1;
										echo "<li><a href=' " . action('AdminController@showPosts', [ $previousPage ]) . "   '><span>«</span></a></li>";
									else:
										echo "<li class='disabled'><a href='javascript:void(0)'><span>«</span></a></li>";
									endif;
									for($i=$page_number-2;$i<=$page_number+2;$i++):
										if($i < 1){ continue; }
										if($i >= $totalPages + 1){ continue; }
										if($i == $page_number):
											echo "<li class='active'><a href='" . action('AdminController@showPosts', ['page_number' => $i]) . "'>" . $i . "</a></li>";
										else:
											echo "<li><a href='" . action('AdminController@showPosts', ['page_number' => $i]) . "'>" . $i . "</a></li>";
										endif;
									endfor;
									if($page_number != $totalPages):
										$nextPage = $page_number + 1;
										echo "<li><a href='" . action('AdminController@showPosts', [ $nextPage ]) . "'><span>»</span></a></li>";
									else:
										echo "<li class='disabled'><a href='javascript:void(0)'><span>»</span></a></li>";
									endif;
							echo "</ul>";
						?>
						<!-- ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-= -->
					</div>
				</div>
				<form action="adminposts" method="post">	
					{{ csrf_field() }}
					<input type="hidden" name="page_number" value="{{ $page_number }}">
					<table class="table table-striped table-hover" style="border: 1px solid #ccc; margin-top: 10px">
						<!-- Table Headers  -->
							<thead>
								<th></th>
								<th></th>
								<th>active</th>
								<th><span style="white-space: nowrap">author name</span></th>
								<th>title</th>
								<th>category</th>
								<th><span style="white-space: nowrap">created date/time</span></th>
								<th>delete</th>
							</thead>
						<?php foreach($postMetaData as $post): ?>
								<tr>
									<!-- Edit Button -->
										<td>
											<a href="<?= action('AdminController@editPost', ['post_id' => $post->post_id]); ?>">edit</a>
										</td>
									<!-- Preview Button -->
										<td>
											<a href="<?= action('AdminController@previewPost', ['id' => $post->post_id] ); ?>">preview</a>
										</td>
									<!-- Set Active -->
										<td>
											<input 	type="checkbox"
													class="activeCheckbox"
													data-post-id="<?= $post->post_id; ?>"
													name="activeCheckbox" <?= $post->active == 1 ? 'checked' : ''; ?>>
										</td>
									<td><?= $post->author->name; ?></td>
									<td><?= $post->title; ?></td>
									<td>
										@if($post->postCategory)
											{{ $post->postCategory->category_name }}
										@else
											Unsorted		
										@endif
									</td>
									<td><?= $post->created_at?></td>
									<!-- Delete Post -->
										<td>
											<button name="deletePost" value="{{ $post->id }}" style="padding: 0; border: none;background: none;">	
												<span class="glyphicon glyphicon-remove" style="color: 	#8B0000"></span>
											</button>
										</td>
								</tr>
						<?php endforeach; ?>
					</table>
    			</form>
    		</div>
			admin.adminpost.blade.php
			
    	</div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	$(".activeCheckbox").on('click', function(){
		post_id = $(this).attr('data-post-id');
		new_status = 0;
		if( $(this).is(':checked') ){
			new_status = 1; 
		}
		$.ajax({
			type: 'post',
			url: 'setPostStatus',
			data: { 
				post_id: post_id,
				new_status: new_status
			},
			success: function(){
				//alert('success.. ');
			}
		});
	});
</script>

@stop