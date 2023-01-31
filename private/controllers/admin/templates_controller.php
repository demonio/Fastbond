<?php
/**
 */
class TemplatesController extends AdminController
{
    # 0
    public function __call($name, $params)
    {
        $this->index($name, ...$params);
    }

    # 1
    public function index($id=0)
    {
        /*if (Input::post()) {
            (new Boxes)->saveBox();
        }

        if ($id) {
            $this->boxes = (new Boxes)->get($id);
        }*/
        View::select('index');
    }
}