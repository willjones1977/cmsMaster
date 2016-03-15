@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.adminTabs')
            <div class='tab-pane adminTab'>
                <div class="panel panel-default" style="margin-top: 50px">
                    <div class="panel-heading">Admin Dashboard</div>
                    <div class="panel-body">
                        <ul>
                         		<li>Show recent posts here</li>
                                <li>Add error reporting ($errors) on all views</li>
                         		<li>Add error pages (404, 500, etc..)</li>
      						    <li>Display X last lines of error and access logs</li>
                         		<li><strike>Create tabs and/or left nav links</strike></li>
                         		<li>
                                    Allow users with privileges to create/edit content
            						<ul>
                                            <li>Create asset management system</li>
                                            <li>Display posts with filters and pagination</li>
                                            <li>Allow posts to be published at date/time</li>
                                            <li>Allow post deletion/soft deletion</li>
                                            <li><strike>Add active/inactive filter to posts</strike></li>
            		                   		<li><strike>Add CKeditor</strike></li>
            							

                                    </ul>
                                </li>
                        </ul>
                        <div style="padding: 10px; border: 1px solid #ccc; margin-top: 20px">     
                            <div style="margin-top: 20px;">
                        
                                <strike>Create a migration to create the following tables</strike>
                                <strike>php artisan make:migration create_post_meta_data_table</strike><br>
                                <strike>php artisan make:migration create_posts_table</strike><br>
                                <strike>    
                                    <table class="table">
                                        <caption>post_meta_data</caption>
                                        <th>id</th>
                                        <th>author_id</th>
                                        <th style="color: red">post_id</th>
                                        <th>title</th>
                                        <th>active</th>
                                        <th>publish_date_time</th>
                                        <th>created_at</th>
                                        <th>updated_at</th>
                                        <th>deleted_at</th>
                                        <tr>
                                          <td>int</td>
                                          <td>int</td>
                                          <td>int</td>
                                          <td>varchar</td>
                                          <td>int</td>
                                          <td>dateTime</td>
                                          <td>dateTime</td>
                                          <td>dateTime</td>
                                          <td>dateTime</td>
                                        </tr>
                                    </table>
                                </strike>
                            </div>
                            <div style="margin-top: 20px;">
                                <strike>    
                                    <table class="table">
                                        <caption>posts</caption>
                                        <th style="color: red">id</th>
                                        <th>post_content</th>
                                        <tr>
                                            <td>int</td>
                                            <td>text</td>
                                        </tr>
                                    </table>
                                </strike>   
                            </div>
                            <div style="margin-top: 20px;">
                                <strike>Create PostMetaData and POSTS models</strike><br>
                                <strike>Create link on the post view to allow existing posts to be edited with this view</strike><br>
                                <ul>
                                    <li><strike>Use ajax to set posts active/inactive</strike></li>
                                    <li><strike>Create post preview view</strike></li>
                                </ul>
                                <ul>
                                    <li>Investigate this: CKEditor uses table attributes that are deprecated in HTML5 (callpadding and cellspaceing)</li>
                                </ul>
                            </div>
                        </div> 
    					          adminindex.blade.php
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection