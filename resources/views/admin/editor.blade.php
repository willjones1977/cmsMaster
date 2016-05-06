@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.adminTabs')
	        <div class='tab-pane adminTab'>

	            <div style="margin-top: 5px; ">
		            <form action="editor" method="post">
			            <?= csrf_field(); ?>
			            <div class="clearfix" style="margin-bottom: 1px; border: 1px solid #ccc">
			                <div style="padding: 5px; border: 1px solid #ccc" class="clearfix">
				                <?php if(!empty($post)): ?>
				                		<!-- Edit Post -->
				                		<input type="hidden" name="post_id" value="<?= $post->id; ?>">
				                <?php else: ?>
				                		<!-- Create Post -->
				                <?php endif;  ?>
				            	<!-- Title -->
			            			<label>Title</label>
				            		<input 	type="text"
				            				name="post_title"
				            				class="form-inline"
				            				value="<?php if(!empty($postMetaData)) {echo $postMetaData->title; }  ?>">
					            <!-- Category -->
					            	<label>Category</label>
					            		<select id="post_category"
					            				name="post_category" 
					            				class="form-inline"
					            				style="height: 30px">
												@foreach($postCategories as $postCategory)
													<option value="{{ $postCategory->id}}"
														@if(isset($post))
															@if($postCategory->id == $post->postMetaData->post_category_id)
																selected
															@endif
														@endif
														>
														{{ $postCategory->category_name }}
													</option>
												@endforeach
					            		</select>
								<!-- Set Post Active/Inactive -->
					            	<label  class="pull-right">
					            		<input type="hidden" name="post_active" value="off">
					            		<input type="checkbox" name="post_active">
					            		Active
					            	</label>
				            	<div style=""></div>
			                </div>
			            	<!-- Edit Mode Post Id -->
			            	
			            	<!-- Publish Date/Time & Submit Button -->
				        	<div class="clearfix" style="padding: 5px; border: 1px solid #ccc;">
				            	<label>Publish date/time</label>
				            	<input name="publish_date" type="date" value="<?= date('Y-m-d'); ?>">
								<input name="publish_time" type="time" class="" value="<?= date('H:i:s'); ?>">
				            	<input type="submit" value="Save Post" class="btn btn-xs btn-primary pull-right">
				        		<input type="button" id="cancelButton" value="Cancel" class="btn btn-xs btn-primary pull-right">
				        	</div>   
			            </div>
			            <textarea name="editor1" id="editor1" rows="10" cols="80">
			                <!--  -->
			                <?php if(!empty($post)) {echo $post->post_content;} ?>
 			            </textarea>
			            <script>
			                // Replace the <textarea id="editor1"> with a CKEditor
			                // instance, using default configuration.
			                //CKEDITOR.replace( 'editor1' );
			                CKEDITOR.replace( 'editor1',
						    {
						    	height: '500px',
						        on :
						        {
						            instanceReady : function( ev )
						            {
						                // Output paragraphs as <p>Text</p>.
						                this.dataProcessor.writer.setRules( 'p',
						                    {
						                        indent : false,
						                        breakBeforeOpen : true,
						                        breakAfterOpen : false,
						                        breakBeforeClose : false,
						                        breakAfterClose : true
						                    });
						            }
						        }
						    });
			            </script>
			        </form>
	            	
	            </div>
		        
		    </div>
			editor.blade.php
		</div>
</div>
<script>
	$("#cancelButton").on('click', function(){
		
		window.history.back();
	});
</script>
@stop