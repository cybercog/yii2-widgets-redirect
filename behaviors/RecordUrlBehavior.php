<?php
/**
 * @link http://www.56hm.com/clovercms/
 * @copyright Copyright (c) 2014 Repar Software LLC
 * @license http://56hm.com/clovercms/license/
 */

namespace repkit\url\behaviors;

use \yii\helpers\Url;
use \yii\base\Controller;



/**
 * This behavior used to record user requested url
 *
 * @author Repar <47558328@qq.com>
 * @since 1.0 
 */
class RecordUrlBehavior extends \yii\base\Behavior {

	public function events()
    {
        return [
            Controller::EVENT_AFTER_ACTION => 'recordUrl',
        ];
    }
    public function recordUrl() { 
       Url::remember();
    }

}