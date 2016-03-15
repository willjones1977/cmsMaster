<ul class="nav nav-tabs">
    <li role="presentation" class="<?= Route::getCurrentRoute()->getPath() == 'adminindex' ? 'active' : '' ?>">
        <a href="<?= action('AdminController@index'); ?>">index</a>
    </li>
    <li role="presentation" class="<?= Route::getCurrentRoute()->getPath() == 'adminposts/{page_number?}' ? 'active' : '' ?>">
    	<a href="<?= action('AdminController@showPosts'); ?>">posts</a>
    </li>
    <li role="presentation" class="<?= Route::getCurrentRoute()->getPath() == 'editor' ? 'active' : '' ?>">
    	<a href="<?= action('AdminController@showEditor'); ?>">editor</a>
    </li>
    <li role="presentation" class="<?= Route::getCurrentRoute()->getPath() == 'assets' ? 'active' : '' ?>">
    	<a href="<?= action('AdminController@showAssets'); ?>">assests</a>
    </li>
    <li role="presentation" class="<?= Route::getCurrentRoute()->getPath() == 'sysinfo' ? 'active' : '' ?>">
    	<a href="<?= action('AdminController@showSysInfo'); ?>">sysinfo</a>
    </li>
    <li role="presentation"><a href="#">config</a></li>
    <li role="presentation"><a href="#">logs</a></li>
</ul>
