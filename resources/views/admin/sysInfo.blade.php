@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('admin.adminTabs')

            <ul>
            	<li>Set tab active</li>
            	<li>Initially echo phpinfo()</li>
            </ul>
			sysInfo.blade.php
		</div>
</div>
@stop