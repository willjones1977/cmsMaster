@extends('layouts.app')

@section('content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        border: none;
        background-color: #fff;
    }

    td{ padding-left: 5px; }
    .folder{ color: #E6CB47; } 
    .file{ color: #ccc; }
    #currentPathInfo{
		border: none;
    	border-bottom: 1px solid #ccc;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('admin.adminTabs')
            <div class="tab-pane adminTab">
				<!--  Directory Contents -->
				<div class="panel" style="padding: 10px; border: 1px solid #ccc">
                    <div style="">
							     
                            <button id="btn-add-directory" class="btn-file">
                                <span  class="glyphicon glyphicon-folder-close folder" 
                                       style="width: 20px; height: 20px; padding: 2px;">
							     	
                                </span>
							</button>
                            <input id="currentPathInfo" type="text" value="<?= $path; ?>" class="form-inline" style="width: calc(100% - 39px)">
                    </div>
                    <table id="directoryContents">
						<caption></caption>
                        <?php   foreach( $directories as $key => $directory): ?>
                                <tr class="tr-directory">
                                    <td>
                                        <span class="glyphicon glyphicon-folder-close folder"></span>
                                    </td>
                                    <td>
                                        <a href="<?= action('AssetController@showAssets', ['path' => $directory]); ?>">
                                            <?= basename($directory); ?>
                                        </a>
                                    </td>
                                </tr>
                        <?php   endforeach; ?>
                        <?php   foreach($filesInfo as $fileInfo): ?>
                                   <tr>
                                       <td>
                                            <span class="glyphicon glyphicon-file file"></span>
                                        </td>
                                       <td><?= $fileInfo['name'] ?></td>
                                       <td><?= $fileInfo['size'] ?>B</td>
                                       <td><?= $fileInfo['mimeType'] ?></td>
                                       <td><?= $fileInfo['lastModified'] ?></td>
                                   </tr>
                        <?php   endforeach; ?>
                    </table>
                   
				</div>

                <hr>
                <ul>
                	<li>
                		To Do
                		<ul>
                			<li>file uploads</li>
                			<li>deletion</li>
                            <li>create Directories</li>
                            <li>up/back buttons</li>
                		</ul>
                	</li>
                </ul>
            </div>
			assets.blade.php
		</div>
</div>
<!-- =================================================================================== -->
<script>
    $("#addDirectory").on('click', function(){
        alert("addDirectory clicked");
    });
    $("#btn-add-directory").on('click', function(){
    	$directoryHtml  = "<tr class='tr-directory'>";
    	$directoryHtml += 	"<td>";
    	$directoryHtml += 			" <span  class='glyphicon glyphicon-folder-close folder'></span>";
    	$directoryHtml += 	"</td>";
    	$directoryHtml += 	"<td>";
    	$directoryHtml += 			"<div class='newDirectory' contenteditable>" + "new_directory" +  "</div>";
    	$directoryHtml += 	"</td>";
    	$directoryHtml += "</tr>";
    	$('#directoryContents .tr-directory:last').after($directoryHtml);
    	$(".newDirectory").focus();
    });
    

    $(document).on('keypress', '.newDirectory', function(event){
	
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			alert('You pressed a "enter" key in textbox');	
		}

	});

</script>


@stop
