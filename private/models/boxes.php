<?php
/**
 */
class Boxes extends LiteRecord
{
    # 1
    public function saveBox()
    {
        parent::save(Input::post('boxes'));
    }
}
