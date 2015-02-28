$(document).ready(function(){

	$(document).on('click','.import-data',function(e){
		e.preventDefault();
		e.stopPropagation();

		var elem = $(this);
		var url = elem.attr('href');
		var dataId = elem.attr('data-id');
		var filename = elem.attr('data-filename');
		var imported = elem.attr('data-imported');
		var msg = '';
		if(imported == 0){
			msg = '<p>This file is not yet imported.</p>';
		}else{
			msg = '<p>This file is already imported.</p>';
		}

		//create dynamic div element
		var div = document.createElement("div");
		var inside1 = document.createElement("div");
		div.id = 'importdata';
		inside1.id = 'importdata-contents';
		div.appendChild(inside1); 
		document.body.appendChild(div); 

		$( '#importdata-contents' ).html( "Are you sure you want to import <strong>" + filename +"?</strong> " + msg );
	   var dialog = $('#importdata').dialog({
	      resizable: false,
	      height:250,
	      modal:true,
	      draggable :false,
	      title: 'Import Selected CSV Schedule.',
	      buttons: {
	        "Import Schedule": function() {
	        	var dialogDiv = $(this);
	         
	         $.ajax({
	         	url: url,
	         	data:{'id': dataId,'importselectedfiles':true},
	         	type: 'POST',
	         })
	         .done(function(e) {
	         	if(e.status == true){
	         		alert(e.message);
	         	}else{
	         		alert(e.message);
	         	}
	         	 
	         })
	         .fail(function() {
	         	dialogDiv.dialog( "close" );
	         	alert('import failed');
	         })
	         .always(function() {
	         	 dialogDiv.dialog( "close" );
	         });
	         
	        },
	        Cancel: function() {
	          $( this ).dialog( "close" );
	        }
	      }
	    });
  });
});