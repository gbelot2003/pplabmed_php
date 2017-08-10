/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.toolbar_custom = [
    	{ name : 'new_group', items: ['jsplus_image_editor', 'jsplus_edit_tag'] }
	]

	config.language = 'en';
    //config.uiColor = '#F7B42C';
    config.toolbarCanCollapse = true;

    config.keystrokes = [
        [ 120, 'save' ]
    ];

    config.linkShowAdvancedTab = false;
    config.linkShowTargetTab = false;
    config.removePlugins = 'font,format,Styles,forms,print,preview,find,about,maximize,showBlocks,undo,redo,find,replace,selectAll,removeFormat,image, flash, iFrame';
    config.removeButtons = 'emoticons,Iframe,Table,Anchor,Strike,Subscript,Superscript';
    config.removeButtons = 'Bloaquote';
    config.jsplus_image_editor_double_click = false;
};
