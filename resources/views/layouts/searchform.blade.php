<?php
/**
 * Created by JetBrains PhpStorm.
 * User: olga
 * Date: 13.10.15
 * Time: 14:58
 * To change this template use File | Settings | File Templates.
 */
?>
<form id="searchform" class="searchform" action="{{ url('post/search')}}" method="get">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <div class="wrap">
            <input id="s" type="text" name="s">
            <i class="material-icons search small prefix">search</i>
        </div>
        <input id="searchsubmit" type="submit" value="Search">
    </div>
</form>