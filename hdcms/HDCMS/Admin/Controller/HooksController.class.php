<?php

/**
 * 钓子处理
 * Class HookController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class HooksController extends AuthController
{
    private $db;

    //构造函数
    public function __init()
    {
        $this->db = K('Hooks');
    }

    //显示钓子列表
    public function index()
    {
        $this->assign('data', $this->db->all());
        $this->display();
    }

    //添加钓子
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addHook()) {
                $this->success('添加成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->display();
        }
    }

    //修改钓子
    public function edit()
    {
        if (IS_POST) {
            if ($this->db->updateHook()) {
                $this->success('更新成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $id = Q('id', 0, 'intval');
            $this->assign('field', $this->db->find($id));
            $this->display();
        }
    }

    //删除钓子
    public function del()
    {
        if ($this->db->delHook()) {
            $this->success('删除成功');
        } else {
            $this->error($this->db->error);
        }
    }
}