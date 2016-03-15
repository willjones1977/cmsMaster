@extends('layouts.app')

@section('content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.adminTabs')
            <div class="tab-pane adminTab">


                <hr>
                <ul>
                	<li>
                		Create asset manager
                		<ul>
                			<li>Allow file uploads</li>
                			<li>Allow file browsing/deletion.. etc</li>
                		</ul>
                	</li>
                </ul>
            </div>
			assets.blade.php
		</div>
</div>
<script>
    
</script>
@stop
