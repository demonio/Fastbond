<?php
/**
 */
class Boxes extends LiteRecord
{
    # 1
    public function saveBox()
    {
        Input::post('boxes.id')
            ? parent::update(Input::post('boxes'))
            : parent::create(Input::post('boxes'));
    }
}
