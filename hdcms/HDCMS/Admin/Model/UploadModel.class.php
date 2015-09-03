<?php

/**
 * 附件表
 * Class UploadModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class UploadModel extends ViewModel
{
    public $table = 'upload';
    public $view = array(
        'upload' => array('_type' => 'INNER'),
        'user' => array('_on' => 'upload.uid=user.uid')
    );

    /**
     * 删除文件
     * @param $id
     */
    public function delFile($id)
    {
        $db = M('upload');
        $data = $db->find($id);
        if ($data) {
            is_file($data['path']) && @unlink($data['path']);
            return $db->del($id);
        }
    }
}
