<?php
require_once CORE_PATH . 'kumbia/controller.php';
/**
 */
abstract class AdminController extends Controller
{
    final protected function initialize()
    {
        $this->clean = empty($_GET['clean']) ? false : true;
        $this->start_time = microtime(1);
		$this->version = '0.2.2';

        Input::isAjax() ? View::template('ajax') : View::template('admin');
    }

    final protected function finalize()
    {
    }
}
