Wygwam HTML5 Video Extension
--------------------

This extension assumes you are using a custom CKEditor config via the customConfig setting in the Wygwam module's "Advanced Settings".
After activating the extension, you will also need something like this in your config.

`
// Add HTML5 Video Plugin
CKEDITOR.plugins.addExternal('video', '/themes/third_party/wygwam_html5_video/video/');
`