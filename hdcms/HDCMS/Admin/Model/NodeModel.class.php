<?php

/**
 * 菜单管理(权限节点)
 * Class MenuModel
 * @author hdxj <houdunwangxj@gmail.com>
 */
class NodeModel extends Model
{
    public $table = 'node';
    //表单验证
    public $validate = array(
        array('title', 'nonull', '名称不能为空', 2, 3),
        array('module', 'nonull', '模块不能为空', 2, 3),
        array('controller', 'nonull', '控制器不能为空', 2, 3),
        array('action', 'nonull', '动作不能为空', 2, 3),
    );

    //添加节点
    public function addNode()
    {
        if ($this->create()) {
            return $this->add();
        }
    }

    //修改节点
    public function editNode()
    {
        if ($this->create()) {
            return $this->save();
        }
    }

    //删除节点
    public function delNode()
    {
        $nid = Q("nid", 0, 'intval');
        if (!$nid) {
            $this->error = '参数错误';
            return false;
        }
        $state = $this->where(array("pid" => $nid))->find();
        if ($state) {
            $this->error = '请删除子菜单';
            return false;
        }
        if ($this->del($nid)) {
            $map['nid'] = $nid;
            M('access')->where($map)->del();
            return true;
        } else {
            $this->error = '删除失败';
        }
    }
}