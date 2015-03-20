<?php
/**
 * @link http://www.56hm.com/clovercms/
 * @copyright Copyright (c) 2014 Repar Software LLC
 * @license http://56hm.com/clovercms/license/
 */

namespace repkit\url;


/**
 * redirect default render asset bundle
 *
 * @author Repar <47558328@qq.com>
 * @since 1.0 
 */
class RedirectAsset extends \yii\web\AssetBundle {
    
    public $sourcePath = '@repkit/url/assets';

    public $css = [
       'css/redirect.min.css'
    ];
}