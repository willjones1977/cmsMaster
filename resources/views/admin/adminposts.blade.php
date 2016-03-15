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
				<table class="table" style="margin-top: 10px">
					<!-- Table Headers  -->
						<th></th>
						<th></th>
						<th>active</th>
						<th>post meta id</th>
						<th>post  id</th>
						<th>author id</th>
						<th>author name</th>
						<th>title</th>
						<th>publish date/time</th>
						<th>created date/time</th>
						<th>updated at</th>
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
								<!-- Active -->
									<td>
										<input 	type="checkbox"
												class="activeCheckbox"
												data-post-id="<?= $post->post_id; ?>"
												name="activeCheckbox" <?= $post->active == 1 ? 'checked' : ''; ?>>
									</td>
								<!-- IDs -->
									<td><?= $post->id ?></td>
									<td><?= $post->post_id ?></td>
									<td><?= $post->author_id ?></td>
								<td><?= $post->author->name; ?></td>
								<td><?= $post->title; ?></td>
								<td><?= $post->publish_date_time; ?></td>
								<td><?= $post->created_at?></td>
								<td><?= $post->updated_at; ?></td>
							</tr>
					<?php endforeach; ?>
				</table>
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