<?php
class Controller {
    public function model($model) {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }
        return null;
    }

    public function view($viewName, $data = []) {
        extract($data);
        if (file_exists('../app/views/' . $viewName . '.php')) {
            require_once '../app/views/' . $viewName . '.php';
        } else {
            echo "View: $viewName không tồn tại.";
        }
    }
}
?>
