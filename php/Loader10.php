<?php

/**
 * php Loader 自动加载器
 */ 
$obj = new Loader10(__DIR__);
class Loader10 {

	/**
	 * @var array $dirs 指定需要加载的目录
	 */
	protected $dirs = array();
	
	/**
	 * @var string $basePath 根目录
	 */
    protected $basePath = '';

    public function __construct($basePath, $dirs = array()) {
        $this->setBasePath($basePath);

        if (!empty($dirs)) {
            $this->addDirs($dirs);
        }
    	spl_autoload_register(array($this, 'load'));
    }
    
    /**
     * 添加需要加载的目录
     * @param string $dirs 待需要加载的目录，绝对路径
     * @return NULL
     */
    public function addDirs($dirs) {
        if(!is_array($dirs)) {
            $dirs = array($dirs);
        }
        $this->dirs = array_merge($this->dirs, $dirs);
    }

    /**
     * 设置根目录
     * @param string $path 根目录
     * @return NULL
     */
    public function setBasePath($path) {
    	$this->basePath = $path;
    }

    public function getBasePath() {
        return $this->basePath;
    }

    /**
     * 自动加载
	 * @param string $className
     */ 
    public function load($className) {
        if (class_exists($className, FALSE) || interface_exists($className, FALSE)) {
            return false;
        }

        if ($this->loadClass(APP_ROOT, $className)) {
            return false;
        }

        foreach ($this->dirs as $dir) {
            if ($this->loadClass($this->basePath . DIRECTORY_SEPARATOR . $dir, $className)) {
                return false;
            }
    	}
    }

    protected function loadClass($path, $className) {
        $file = $path . DIRECTORY_SEPARATOR 
            . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (file_exists($file)) {
            require_once $file;
            return true;
        }

        return false;
    }
}
