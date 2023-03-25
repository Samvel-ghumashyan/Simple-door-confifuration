<?php


namespace dconf;


use RedBeanPHP\R;

class View
{

    public string $content = '';
    public $route;
    public $layout = '';
    public $view = '';
    public $meta = [];


    public function __construct($route, $layout = '', $view = '', $meta = [])
    {
        $this->route = $route;
        $this->layout = $layout;
        $this->view = $view;
        $this->meta = $meta;

        if (false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }


    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        $view_file = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        if (is_file($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид {$view_file}", 500);
        }

        if (false !== $this->layout) {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layout_file)) {
                require_once $layout_file;
            } else {
                throw new \Exception("Не найден шаблон {$layout_file}", 500);
            }
        }
    }

    public function getMeta()
    {
        $out = '<title>' . h($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name="description" content="' . h($this->meta['description']) . '">' . PHP_EOL;
        $out .= '<meta name="keywords" content="' . h($this->meta['keywords']) . '">' . PHP_EOL;
        return $out;
    }

    // public function getDbLogs()
    // {
    //     if (DEBUG) {
    //         $logs = R::getDatabaseAdapter()
    //             ->getDatabase()
    //             ->getLogger();
    //         $logs = array_merge($logs->grep( 'SELECT' ), $logs->grep( 'select' ), $logs->grep( 'INSERT' ), $logs->grep( 'UPDATE' ), $logs->grep( 'DELETE' ));
    //         debug($logs);
    //     }
    // }

}