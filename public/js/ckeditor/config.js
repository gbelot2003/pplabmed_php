/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'es';
    //config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

    config.keystrokes = [
        [ 120, 'save' ],
    ];


    config.linkShowAdvancedTab = false;
    config.linkShowTargetTab = false;
    config.removePlugins = 'font,format,Styles,forms,print,preview,find,about,maximize,showBlocks,undo,redo,find,replace,selectAll,removeFormat,image, flash, iFrame';
    config.removeButtons = 'emoticons,Iframe,Table,Anchor,Underline,Strike,Subscript,Superscript';
    config.removeButtons = 'Underline,JustifyCenter,Bloaquote';

};
