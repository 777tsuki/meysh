<?php
class Router
{
    private $routerMap = array();

    // 路由派发
    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $routerArr = $this->routerMap[$requestMethod];
        
        $this->handleUri($routerArr);
    }

    // 注册GET请求的路由
    public function get($patternStr, $fn) {
        $pattern = $this->routerTemplateToReg($patternStr);
        $this->register('GET', $patternStr, $pattern, $fn);
    }
    // 注册POST请求的路由
    public function post($patternStr, $fn) {
        $pattern = $this->routerTemplateToReg($patternStr);
        $this->register('POST', $patternStr, $pattern, $fn);
    }
    // 路由注册函数
    public function register($method, $patternStr, $pattern, $fn) {
        $this->routerMap[$method][] = array(
            'pattern' => $pattern,
            'patternStr' => $patternStr,
            'callback' => $fn
        );
    }
    // 把路由模板转换为正则表达式
    private function routerTemplateToReg($patternStr) {
        $txt = preg_replace('~{\w*}~','(\w*)',$patternStr);
        return '~^'.$txt.'$~';
    }
    // 遍历注册的路由找到与当前访问服务器的uri相匹配的路由，分离参数，调用对应的处理函数
    private function handleUri($routerArr) {
        $uri = $this->getCurrentUri();
        foreach($routerArr as $v) {
            $matchRes = preg_match_all($v['pattern'], $uri, $matches, PREG_OFFSET_CAPTURE);
            // var_dump($matches);
            if($matchRes) {
                $matches = array_slice($matches, 1);
                $callbackParam = array_map(function ($item,$index) {
                    return $item[0][0];
                },$matches,array_keys($matches));
                $fn = $v['callback'];
            } 
        }
        
        call_user_func_array($fn, $callbackParam);

    }
    // 获取当前访问服务器的uri
    private function getCurrentUri() {
        $uri = $_SERVER['REQUEST_URI'];
        $scriptNameArr = explode('/', $_SERVER['SCRIPT_NAME']);
        foreach($scriptNameArr as $v) {
            if($v !== '') {
                $uri = str_replace('/'.$v,'',$uri);
            }
        }
        $uriArr = explode('?',$uri);
        return $uriArr[0];
    }
}
?>