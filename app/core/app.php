<?php
class App {
    protected $controller = 'home';
    protected $action = 'index';
    protected $params = [];

    public function __construct() {
        $urlArr = $this->UrlProcess();

        // Xử lý Controller
        if (isset($urlArr[0]) && file_exists('../app/controllers/' . strtolower($urlArr[0]) . '.php')) {
            $this->controller = strtolower($urlArr[0]);
            unset($urlArr[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // Xử lý Action
        if (isset($urlArr[1])) {
            if (method_exists($this->controller, $urlArr[1])) {
                $this->action = $urlArr[1];
                unset($urlArr[1]);
            }
        }

        // Xử lý Params
        $this->params = $urlArr ? array_values($urlArr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    public function UrlProcess() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
?>
