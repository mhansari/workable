/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
  config.toolbar = [
  
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', '-',  'NumberedList', 'BulletedList' ] },
    
    
  ];
  config.extraPlugins='confighelper';
  config.removeDialogFields='image:info:txtBorder';
};
