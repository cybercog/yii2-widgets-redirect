<?php
/**
 * @link http://www.56hm.com/clovercms/
 * @copyright Copyright (c) 2014 Repar Software LLC
 * @license http://56hm.com/clovercms/license/
 */

namespace repkit\url;

use Yii;
use yii\web\View;
use yii\helpers\Url;


/**
 * redirect url class
 *
 * @author Repar <47558328@qq.com>
 * @since 1.0 
 */
class RedirectUrl {

	const REDIRECT_BACK = 'BACK';
	const REDIRECT_HOME = 'HOME';

    /**
     * @var integer The Page wait time
     */
	public $wait = 5;

    /**
     * @var string The page layout file
     */
	public $layout = '@repkit/url/views/layouts/redirect.php';

  /**
   * @var reader render view file
   */
	public $render = '@repkit/url/views/redirect/redirect';

  	public function __construct(){
  	   Yii::$app->controller->layout = $this->layout;
  	}
    
    /**
     * Display hint messages and redirect target url
     * @param $url [string] redirect target url
     * @param $msg [string] hint messages
     * @param $wait [integer] wait time
     * @return string
     */
    public function jump($url, $msg, $wait = null){

       switch($url){
           
           case static::REDIRECT_BACK:
              $url = Url::previous();
              break;
           case static::REDIRECT_HOME:
              $url = Url::home();
              break;
       }

       if(!is_null($wait) && ($wait = intval($wait)) > 0){
       	   $this->wait = intval($wait);
       }
       $this->registerScript($url);
       return Yii::$app->controller->render($this->render,[
            'wait' => $this->wait,
            'url' => $url,
            'msg' => $msg
       ]);
    }

    /**
     * register extension require javascript
     * @param $url [string] redirect target url
     */
    protected function registerScript($url){
		$script = <<<EOF
		window.onload = function(){
		   var wait = document.getElementById('wait');

		   if(wait != undefined){
		       var interval = setInterval(function(){
		         var num = wait.innerHTML;
		         if(num > 0){   
		            wait.innerHTML = num - 1
		         }else{
		            clearInterval(interval);
		            window.location.href = "{$url}"
		         }
		       },1000);
		   }
		}
EOF;
    	  Yii::$app->getView()->registerJs($script, View::POS_END);

    }
}