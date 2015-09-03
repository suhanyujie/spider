<include file="__PUBLIC__/header"/>
<body>
<div class="hd-menu-list">
    <ul>
        <li>
            <a href="{|U:'Model/index'}">
                模型列表
            </a>
        </li>
        <li>
            <a href="{|U:'index',array('mid'=>$_GET['mid'])}">
                字段列表
            </a>
        </li>
        <li class="active">
            <a href="#">
                修改字段
            </a>
        </li>
    </ul>
</div>
<div class="hd-title-header">
    修改字段
</div>
<form method="post" onsubmit="return hd_submit(this,'{|U:'edit'}','{|U:'index',array('mid'=>$field['mid'])}')">
    <input type="hidden" name="fid" value="{$hd.get.fid}"/>
    <input type="hidden" name="mid" value="{$hd.get.mid}"/>
    <input type="hidden" name="field_type" value="{$field.field_type}"/>
    <input type="hidden" name="table_name" value="{$field.table_name}"/>
    <table class="hd-table hd-table-form hd-form">
        <tr>
            <th class="hd-w400">模型</th>
            <td>{$model_name}</td>
        </tr>
        <tr>
            <th>
                字段标题
                <span class="star">*</span>
                <span class="notice">例如：文章标题</span>
            </th>
            <td>
                <input type="text" name="title" class="hd-w200"
                       value="{$field.title}"/>
            </td>
        </tr>
        <tr>
            <th> 字段提示</th>
            <td><textarea name="tips" class="hd-w400 h80">{$field.tips}</textarea>
            </td>
        </tr>
    </table>
    <div class="field_tpl">
        {$setField}
    </div>
    <table class="hd-table hd-table-form hd-form">
        <tr>
            <th class="hd-w400"> 表单样式名 <span class="notice">定义表单的CSS样式名</span></th>
            <td>
                <input type="text" name="css" class="hd-w250"
                       value="{$field.css}"/>
            </td>
        </tr>
        <tr>
            <th>
                字符长度取值范围 <span class="notice">系统将在表单提交时检测数据长度范围是否符合要求，如果不想限制长度请留空</span>
            </th>
            <td>
                最小值：<input type="text" name="minlength" class="hd-w50"
                            value="{$field.minlength}"/>
                最大值：<input type="text" name="maxlength" class="hd-w50"
                           value="{$field.maxlength}"/>
            </td>
        </tr>
        <tr>
            <th> 表单验证 <span
                    class="notice">系统将通过此正则校验表单提交的数据合法性，如果不想校验数据请留空</span></th>
            <td>
                <input type="text" name="validate" class="hd-w250 input_validation"
                       value="{$field.validate}"/>
                <select id="field_check">
                    <option value="">常用正则</option>
                    <option value="/^[0-9.-]+$/">数字</option>
                    <option value="/^[0-9-]+$/">整数</option>
                    <option value="/^[a-z]+$/i">字母</option>
                    <option value="/^[0-9a-z]+$/i">数字+字母</option>
                    <option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail
                    </option>
                    <option value="/^[0-9]{5,20}$/">QQ</option>
                    <option value="/^http:\/\//">超级链接</option>
                    <option value="/^(1)[0-9]{10}$/">手机号码</option>
                    <option value="/^[0-9-]{6,13}$/">电话号码</option>
                    <option value="/^[0-9]{6}$/">邮政编码</option>
                </select><span id="hd_validation"></span>
            </td>
        </tr>
        <tr>
            <th> 必须输入 <span class="notice">如果表单必须设置值时选择‘是’</span></th>
            <td><label>
                    <input type="radio" name="required" value="1"
                    <if value="$field.required eq 1">checked=""</if>
                    />
                    是</label><label>
                    <input type="radio" name="required" value="0"
                    <if value="$field.required eq 0">checked=""</if>
                    />
                    否</label>
            </td>
        </tr>
        <tr>
            <th> 错误提示 <span class="notice">输入内容不正确时的提示信息</span></th>
            <td>
                <input type="text" name="error" class="hd-w300"
                       value="{$field.error}"/>
            </td>
        </tr>
        <tr>
            <th> 值唯一</th>
            <td>
                <label>
                    <input type="radio" name="isunique" value="1"
                    <if value="$field.isunique eq 1">checked=""</if>
                    />
                    是</label><label>
                    <input type="radio" name="isunique" value="0"
                    <if value="$field.isunique eq 0">checked=""</if>
                    />
                    否</label>
            </td>
        </tr>
        <tr>
            <th> 作为基本信息 <span class="notice">基本信息将在添加页面左侧显示</span></th>
            <td>
                <label>
                    <input type="radio" name="isbase" value="1"
                    <if value="$field.isbase eq 1">checked=""</if>
                    />是
                </label>
                <label>
                    <input type="radio" name="isbase" value="0"
                    <if value="$field.isbase eq 0">checked=""</if>
                    />否
                </label>
            </td>
        </tr>
        <tr>
            <th> 作为搜索条件</th>
            <td>
                <label>
                    <input type="radio" name="issearch" value="1"
                    <if value="$field.issearch eq 1">checked=""</if>
                    />
                    是</label><label>
                    <input type="radio" name="issearch" value="0"
                    <if value="$field.issearch eq 0">checked=""</if>
                    />
                    否</label>
            </td>
        </tr>
        <tr>
            <th> 在前台投稿中显示</th>
            <td>
                <label>
                    <input type="radio" name="isadd" value="1"
                    <if value="$field.isadd eq 1">checked=""</if>
                    />
                    是</label>
                <label>
                    <input type="radio" name="isadd" value="0"
                    <if value="$field.isadd eq 0">checked=""</if>
                    />
                    否</label>
            </td>
        </tr>
    </table>
    <input type="submit" value="确定" class="hd-btn"/>
</form>
<script>

    //验证规则切换
    $("#field_check").live("change", function () {
        $("[name='validate']").val($(this).val());
    })
</script>
</body>
</html>