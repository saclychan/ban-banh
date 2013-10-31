/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'Number17';

    config.toolbar_Number17 =

[
   /* ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
   
    ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    '/',
    */
   
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript','Preview'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    '/',
    ['Styles','Format','Font','FontSize'],
   
    /*
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    */
   
    
    ['Link','Unlink'/*,'Anchor'*/],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','TextColor','BGColor','RemoveFormat','Maximize', 'ShowBlocks','-',/*'About'*/],
    /*'/',*/
    
   
    
    /*['TextColor','BGColor','RemoveFormat'],*/
    /*['Maximize', 'ShowBlocks','-','About']*/
    
];

//config.language = 'vi';
config.uiColor = '#68EEF9';
skin : 'office2003';

};
