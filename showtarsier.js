// JavaScript Document

(function() {  

    function addbuttonLSD_TS1(ed, url){
        ed.addButton('LSD_TS1', {  
            title : 'Add Tarsier Social 1',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS1]</span>');  
            }  
        });  
    }
	function addbuttonLSD_TS2(ed, url){
        ed.addButton('LSD_TS2', {  
            title : 'Add Tarsier Social 2',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS2]</span>');  
            }  
        });  
    }
	
	function addbuttonLSD_TS3(ed, url){
        ed.addButton('LSD_TS3', {  
            title : 'Add Tarsier Social 3',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS3]</span>');   
            }  
        });  
    }
	
	function addbuttonLSD_TS4(ed, url){
        ed.addButton('LSD_TS4', {  
            title : 'Add Tarsier Social 4',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS4]</span>');  
            }  
        });  
    }
	
	function addbuttonLSD_TS5(ed, url){
        ed.addButton('LSD_TS5', {  
            title : 'Add Tarsier Social 5',  
            image : url+'/tarsier-wpicon.png',  
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS5]</span>');  
            }  
        });  
    }
	
	function addbuttonLSD_TS6(ed, url){
        ed.addButton('LSD_TS6', {  
            title : 'Add Tarsier Social 6',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS6]</span>');  
            }  
        });  
    }
	
	function addbuttonLSD_TS7(ed, url){
        ed.addButton('LSD_TS7', {  
            title : 'Add Tarsier Social 7',  
            image : url+'/tarsier-wpicon.png', 
            onclick : function() {  
                 ed.selection.setContent('<span style="color: #ff0000;">[tarsierTS7]</span>');  
            }  
        });  
    }

    tinymce.create('tinymce.plugins.LSD_tarsierTS', {  
        init : function(ed, url) {  
            addbuttonLSD_TS1(ed, url);  
			addbuttonLSD_TS2(ed, url);
			addbuttonLSD_TS3(ed, url);
			addbuttonLSD_TS4(ed, url);
			addbuttonLSD_TS5(ed, url);
			addbuttonLSD_TS6(ed, url);
			addbuttonLSD_TS7(ed, url);
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  

    tinymce.PluginManager.add('LSD_tarsierTS', tinymce.plugins.LSD_tarsierTS);  
})();  
