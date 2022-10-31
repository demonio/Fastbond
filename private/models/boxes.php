<?php
/**
 */
class Boxes extends LiteRecord
{
    # 1
    public function saveBox()
    {
        $action = $_POST['action'];
        
        if ($action == 'create') {
            parent::create(Input::post('boxes'));
        }
        elseif ($action == 'clone') {
            $post = Input::post('boxes');
            unset($post['id']);
            parent::create($post);
        }
        elseif ($action == 'update') {
            parent::update(Input::post('boxes'));
        }
        elseif ($action == 'delete') {
            parent::delete(Input::post('boxes.id'));
        }
    }
}
