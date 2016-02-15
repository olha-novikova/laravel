<?php
/**
 * Created by JetBrains PhpStorm.
 * User: olga
 * Date: 16.10.15
 * Time: 13:17
 * To change this template use File | Settings | File Templates.
 */

class ImageByUrl extends \SleepingOwl\Admin\Columns\Column\BaseColumn
{

    public function render($instance, $totalCount)
    {
        $url = ( $instance->avatar != '' ) ? $instance->avatar : asset('images/yuna.jpg');
        $title = ( $instance->name != '' ) ? $instance->name : 'noavatar';
        $src = '<img width="100" src="'.$url.'" alt="'.$title.'" title="'.$title.'" >';
        return parent::render($instance, $totalCount, $src);
    }

}
