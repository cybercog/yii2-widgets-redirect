Yii2-Widgets-Redirect
=====================
This extension is an the Page hint and redirect of The widget

> NOTE: This extension dependent on the [yiisoft/yii2](https://github.com/yiisoft/yii2). Check This  extension the bundled ```composer.json``` requirements and dependencies. At the same time, This extension has been encapsulated in [reparsoft/Yii2-Widgets](https://github.com/reparsoft/yii2-widgets/) extension. Unified call namespace ```repkit\widgets```. If the user choose custom installation other extensions, at use of time,
> ```namespace``` Please refer API Documentation of ```origin namespace``` description.



## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Remember to refer to the bundled ```composer.json``` for this extension's requirements and dependencies. 


### Install

Either run

```
$ php composer.phar require reparsoft/yii2-widgets-redirect "*"
```

or add

```
"reparsoft/yii2-widgets-redirect": "*"
```

to the ```require``` section of your `composer.json` file.



##Usage

#### step1
 Once the extension is installed, simply modify your application configuration as follows:

	return[
	   'components' => [
	       'redirect' => '\repkit\widgets\RedirectUrl'
	   ]
	]

or

	return[
		'components' => [
		   'redirectUrl' => [
		      'class' => '\repkit\widgets\RedirectUrl',
              ......
		   ]
		]
	]


#### step2
Add route record behavior to controller (added this config later, you can used back previous page of Operation):

	public function behaviors()
	{
	  return [
	     'recordUrl' => [
	        'class' => \repkit\url\behaviors\RecordUrlBehavior::className()
	     ],
	  ];
	}


#### Settings Options
Settings options can at set in Configuration file
 
```wait: ``` [integer] wait time

- defaultValue: 5  (Unit: second)

```layout:``` [string] The page layout file

- defaultValue: "@repkit/url/views/layouts/redirect.php"

```render:``` [string] render view file

- defaultValue: "@repkit/url/views/redirect/redirect"


#### Setting Options Example

	return[
		'components' => [
		   'redUrl' => [
		      'class' => '\repkit\widgets\RedirectUrl',
              'wait' => 3,
              'layout' => ...,
              'render' => ...
		   ]
		]
	]




### Const:

- REDIRECT_BACK: "BACK"
- REDIRECT_HOME: "HOME"



### funtions

```jump```: Display hint messages and redirect target url

- params:
  * $url: [string] target url
  * $msg: [string] hint message
  * $wait: [integer|empty] wait time. (default: null)
- return: [string]


		public function jump($url, $msg, $wait=null){
		   ...
		}

####Example:

	public function actionIndex(){
	  return \Yii::$app->redirectUrl->jump('BACK', 'back previous page', 20);
	}


	public function actionIndex(){
	  return \Yii::$app->redirectUrl->jump(Url::to(['login']), 'sorry! please login first');
	}

Yii2-Toolkit API Documentation
--------------------------------

- API Documentation github repository: [Yii2-Toolkit-Doc Github Repository](https://github.com/reparsoft/yii2-toolkit-doc/).
- Online API Documentation: [Yii2-Toolkit API Documentation](http://reparsoft.github.io/yii2-toolkit-doc/)



## License

This extension is released under the BSD-3-Clause License. See the bundled `LICENSE.md` for details.