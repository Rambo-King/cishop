<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-24
 * Time: 上午10:56
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form action="<?php echo site_url('news/insert') ?>" method="post">
    <fieldset>
        <legend>添加新闻</legend>
        <ul>
            <li><label for="">标题</label><input type="text" name="title"/></li>
            <li><label for="">作者</label><input type="text" name="author"/></li>
            <li><label for="">正文</label><textarea name="content" id="" cols="100" rows="7"></textarea></li>
            <li><label for="">&nbsp;&nbsp;</label><input type="submit" name="btn" value="添加"/></li>
            <input type="hidden" name="act" value="add" />
        </ul>
    </fieldset>
</form>