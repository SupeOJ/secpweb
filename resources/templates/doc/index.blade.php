<!DOCTYPE html>
<html style="height: 100%;">
<head>
   <title>SECPWEB</title>
</head>
<body style="height: 100%; margin: 0;">
    <div id="placeholder" style="height: 100%"></div>
	<script type="text/javascript" src="http://{{$onyofficeserver}}/web-apps/apps/api/documents/api.js"></script>
    <script type="text/javascript">
		config = {
			"documentType": "{{$documentType}}",
			"type":"main",
			"document": {
				"fileType": "{{$fileType}}",
				"key": "{{$key}}",//Khirz6zTPdfd9
				"title": "{{$filename}}",
				"url": "{{$docurl}}",
				"permissions": {
					"reader":true,
					"download": true ,
					"edit": {{$permissions_eidt}} ,
					"print": true,
					"review":"edit",
					"rename":true,
					"changeHistory":false
				}
			},
	
			"editorConfig": {
				"mode":"$mode",
				"canAutosave":true,
				"canCoAuthoring":true,
				"callbackUrl": "{{site_url()}}/docapi/savedoc",
				"createUrl":'',
				"location":"zh-CN",
				"lang":"zh-CN",
				"user": {
						id:'1',
						firstname:'chen',
						name:'mu'
					}
			   ,"customization": {
					"chat":true,
					"comments":true,
					"goback":false,
					"compactToolbar":true,
					"about": false,
					"leftMenu": true,
					"rightMenu": true,
					"toolbar": true,
					"header": false,
					"autosave": true
				}
			},

			events: {
				'onAppReady': function(){},
				'onBack': function(){},
				'onError': function(){},
				'onSave': function(){}
			}
		};

		var docEditor = new DocsAPI.DocEditor("placeholder", config);


	
	</script>
</body>
</html>



