<?php
class iviewer extends CWidget{
    public $debug = YII_DEBUG;
    public $selector;
    public $cssFile;
    public $jsHandlerVar;
    protected $assetsPath;
    
    protected $baseUrl;
    
    /**
     * @var CClientScript
     */
    protected $cs;
    
    public $options = array();
    
    public function publishAssets()
    {
        $this->assetsPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        $this->baseUrl = Yii::app()->getAssetManager()->publish($this->assetsPath, false, -1, $this->debug);
        return $this;
    }
    
    public function init()
    {
        //  most of places use it so make it as instance variable and for intelligence tips from IDE
        $this->cs = Yii::app()->getClientScript();
        parent::init();
    }
    
    public function run() {
       $this->publishAssets();
       $this->registerClientScripts();
    }
    
    public function registerClientScripts()
    {
        //> .register js file;
        $this->cs->registerCoreScript('jquery')->registerScriptFile($this->baseUrl . '/jqueryui.js',CClientScript::POS_END);
        $this->cs->registerCoreScript('jquery')->registerScriptFile($this->baseUrl . '/jquery.iviewer.js',CClientScript::POS_END);
        $this->cs->registerCoreScript('jquery')->registerScriptFile($this->baseUrl . '/jquery.mousewheel.js',CClientScript::POS_END);
        if(empty($this->cssFile)){
            $this->cs->registerCssFile($this->baseUrl . '/jquery.iviewer.css');
        }else{
             $this->cs->registerCssFile($this->cssFile);
        }
        if (empty($this->selector)){
            // manually use it ?
              return  $this;
        }
        
        if(empty($this->jsHandlerVar)){
            $this->jsHandlerVar='iviewerHandler';
        }
        $jsCode = '';
        //> handle some settings

        $options = CJavaScript::encode($this->options);
        //>  the js code for setup
        $jsCode .= <<<SETUP
        var {$this->jsHandlerVar}=$("{$this->selector}").iviewer({$options});
SETUP;
        //> register jsCode
        $this->cs->registerScript(__CLASS__ . '#' . $this->getId(), $jsCode, CClientScript::POS_READY);
        return $this;
    }
}
