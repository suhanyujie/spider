<table class="hd-table hd-table-form hd-form">
    <tr class="input action">
        <th class="hd-w400">参数</th>
        <td>
            <table class="hd-table hd-table-form hd-form">
                <tr>
                    <td class="hd-w100">宽度</td>
                    <td><input type="text" name="set[width]" class="hd-w100 textarea_width" value="<?php echo $field['set']['width'];?>"/> </td>
                </tr>
                <tr>
                    <td>高度</td>
                    <td><input type="text" name="set[height]" class="hd-w100 textarea_height" value="<?php echo $field['set']['height'];?>"/> </td>
                </tr>
                <tr>
                    <td>默认值</td>
                    <td><textarea class="hd-w300 h60" name="set[default]"><?php echo $field['set']['default'];?></textarea></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
