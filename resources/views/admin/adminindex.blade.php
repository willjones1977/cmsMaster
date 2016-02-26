@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">posts</a></li>
                <li role="presentation"><a href="#">editor</a></li>
                <li role="presentation"><a href="#">assests</a></li>
                <li role="presentation"><a href="#">sysinfo</a></li>
                <li role="presentation"><a href="#">config</a></li>
                <li role="presentation"><a href="#">logs</a></li>
            </ul>
            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                   <ul>
                   		<li>Add error reporting ($errors) on all views</li>
                   		<li>Add error pages (404, 500, etc..)</li>
						<li>Display X last lines of error and access logs</li>
                   		<li>Create tabs and/or left nav links</li>
                   		<li>
                   			Allow users with privileges to create/edit content
							<ul>
		                   		<li>Add CKeditor</li>
		                   		<li>Create asset management system</li>
		                   		<li>Display posts with filters and pagination</li>
		                   		<li>Allow posts to be published at date/time</li>
		                   		<li>Allow post deletion/soft deletion</li>
		                   		<li>Add active/inactive filter to posts</li>
							</ul>
                   		</li>

                   </ul> 
					adminindex.blade.php
                </div>
            </div>
        </div>
    </div>
</div>
@endsection