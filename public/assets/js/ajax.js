
//************NOTES*******************************
function refreshNoteContent(){
         if ($("#search").val()!="") {
        	 var query = "?search="+$("#search").val();
         	$('#notesTable').load('notes/all/'+ query);
         }
         else
        	 $('#notesTable').load('notes/all');
         $("#text").val(''); 	
         $('#ajax-loader').hide();
    }
$(document).on('keyup', '#search',function(){
		refreshNoteContent();
});
   
   
// add new note
$(document).on('click', '#addNote',function(){
       	$('#ajax-loader').show();
    	var $form = $('#noteForm');
        // let's select and cache all the fields
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();
    	$.ajax({
    		url: 'notes/create',
    		type: 'post',
            data: serializedData,
            success: function(data){
            	messages(data, '#messages');
             },
            error: function() {
                alert('Client DB is currently unavailable; please try again later.');
            },
            complete: function () {
            	
            	refreshNoteContent();
            	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
            }
    	});// ajax call
});	// END add note
   



// delete note
$(document).on('click', '.noteDelete',function(){
    	// geting the id from table <tr> 
		var id = this.parentNode.parentNode.id;
		$("#confirm").attr('data-info',id).attr('data-type','note').modal('show');
    
});	// END confirmation delete note

$(document).on('click', '#confirmOk',function(){
	id= $("#confirm").attr('data-info');
	typ = $("#confirm").attr('data-type');
	if (typ =="note"){
		$("#confirm").modal('hide');
		$('#ajax-loader').show();
		$.ajax({
			url: 'notes/delete',
			type: 'get',
			data: {'id':id},
	        success: function(data){
	        	messages(data);
	         },
	        error: function() {
	            alert('Client DB is currently unavailable; please try again later.');
	        },
	        complete: function () {
	        	refreshNoteContent();
	        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
	        }
		});// ajax call
	}
	else
	{
		$("#confirm").modal('hide');
		$('#ajax-loader').show();
		$.ajax({
			url: 'images/delete',
			type: 'get',
			data: {'id':id},
	        success: function(data){
	        	messages(data, "#messages");
	         },
	        error: function() {
	            alert('Client DB is currently unavailable; please try again later.');
	        },
	        complete: function () {
	        	refreshImageContent();
	        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
	        }
		});// ajax call
		
	}
});// end actual delete


//POST update 
$(document).on('click', '#updateNote',function(){
	// geting the id from table <tr> 
	var	id= $("#editModal").attr('data-info');

  	var $form = $('#formUpdate');
    // let's select and cache all the fields
    var $inputs = $form.find("textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();
	
	$('#ajax-loader').show();
	$.ajax({
		url: 'notes/update?id='+id,
		type: 'post',
		data: serializedData,
        success: function(data){
        	messages(data);
         },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	refreshNoteContent();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END update get note


//GET update note 
$(document).on('click', '.noteUpdate',function(){
	// geting the id from table <tr> 
	var id = this.parentNode.parentNode.id;
	$('#ajax-loader').show();
	$.ajax({
		url: 'notes/update',
		type: 'get',
		data: {'id':id},
        success: function(data){
        	var data = $.parseJSON(data);
       	
        		$("#formUpdate textarea").val(data['description']);
        		$("#editModal").attr('data-info',data['id']).attr('data-type','note').modal('show');
        	
         },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	$('#ajax-loader').hide();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END update get note

//GET update note 
$(document).on('click', '.viewNote',function(){
	// geting the id from table <tr> 
	var id = this.parentNode.parentNode.id;
	$('#ajax-loader').show();
	$.ajax({
		url: 'notes/update',
		type: 'get',
		data: {'id':id},
        success: function(data){
        	var data = $.parseJSON(data);
       	
        		$("#viewModal .modal-body").html('<p>' + data['description'] + "</p>");
        		$("#viewModal").modal('show');
        	
         },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	$('#ajax-loader').hide();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END update get note

//************TBD*******************************


function refreshTbdContent(){
	$('#ajax-loader').show();
	var status = $('#tbd').attr('data-status');
	var search = $("#searchtbd").val()
	if (search !="") {
   	 var query = "?status=" +status + "&search="+search;
    	$('#tbdTable').load('tbd/all/'+ query);
    }
    else
    {
    	var query = "?status=" +status;
		$('#tbdTable').load('tbd/all'+ query);
    }
		$("#tbdForm #tbd_date").val('');
		$("#tbdForm #tbd_text").val('');
		$('#ajax-loader').hide();
    
}

$(document).on('keyup', '#searchtbd',function(){
	refreshTbdContent();
});


$(".datePicker" ).datepicker({
    format: 'yyyy-mm-dd'
});


//add new tbd
$(document).on('click', '#addtbd',function(){
       	$('#ajax-loader').show();
    	var $form = $('#tbdForm');
        // let's select and cache all the fields
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();
    	$.ajax({
    		url: 'tbd/create',
    		type: 'post',
            data: serializedData,
            success: function(data){
            	messages(data, "#messages");
             },
            error: function() {
                alert('Client DB is currently unavailable; please try again later.');
            },
            complete: function () {
            	
            	refreshTbdContent();
            	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
            }
    	});// ajax call
});	// END add note
   
//change status
$(document).on('click', '.tbdStatus',function(){
	var id = this.parentNode.parentNode.id;
	$('#ajax-loader').show();
	$.ajax({
		url: 'tbd/status',
		type: 'post',
        data: {'id' : id},
        
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	refreshTbdContent();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END change status
	
//change type tbd
$(document).on('click', '.btn-group .btn',function(){
	if ($(this).hasClass("active") == false){
		$('.btn-group .btn').removeClass('active');
		$(this).addClass('active');
		
		$('#tbd').attr('data-status', this.id);
		refreshTbdContent();
	}
});	// END add note

//change status
$(document).on('click', '.tbdDelete',function(){
	var id = this.parentNode.parentNode.id;
	$('#ajax-loader').show();
	$.ajax({
		url: 'tbd/delete',
		type: 'get',
        data: {'id' : id},
        success: function(data){
        	messages(data, "#messages");
         },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	refreshTbdContent();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END change status



//GET update tbd 
$(document).on('click', '.tbdUpdate',function(){
	// geting the id from table <tr> 
	var id = this.parentNode.parentNode.id;
	//alert('fds');
    var text = $(this).parent().prev().prev().text();
    var date = $(this).parent().prev().prev().prev().text();
    
    $("#formTbdUpdate #tbd_date").val(date.trim());
    $("#formTbdUpdate #tbd_text").val(text);
    $("#editTbdModal").attr('data-info',id).modal('show');
        	
    
});	// END update tbd

//post update tbd
$(document).on('click', '#updateTbd',function(){
       	$('#ajax-loader').show();
    	var $form = $('#formTbdUpdate');
        // let's select and cache all the fields
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();
        var id = $("#editTbdModal").attr('data-info');
    	$.ajax({
    		url: 'tbd/update?id='+id,
    		type: 'post',
            data: serializedData,
            success: function(data){
            	messages(data);
             },
            error: function() {
                alert('Client DB is currently unavailable; please try again later.');
            },
            complete: function () {
            	
            	refreshTbdContent();
            	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
            }
    	});// ajax call
});	// END update tbd

//************Links*******************************

function refreshLinkContent(){
	$('#ajax-loader').show();
	
	var search = $("#searchLink").val()
	if (search !="") {
   	 var query = "?search="+search;
    	$('#linkTable').load('links/all/'+ query);
    }
    else
    {
    	
		$('#linkTable').load('links/all');
    }
		$("#linkForm #url").val('');
		$('#ajax-loader').hide();
}

$(document).on('keyup', '#searchLink',function(){
	refreshLinkContent();
});

//Add a new link 
$(document).on('click', '#addLink',function(){
   	$('#ajax-loader').show();
	var $form = $('#linkForm');
    // let's select and cache all the fields
    var $inputs = $form.find("input");
    // serialize the data in the form
    var serializedData = $form.serialize();
    //var id = $("#editTbdModal").attr('data-info');
	$.ajax({
		url: 'links/create',
		type: 'post',
        data: serializedData,
        success: function(data){
        	messages(data, "#messages");
        },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	refreshLinkContent();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END add link

//Delete link 
$(document).on('click', '.linkDelete',function(){
   	$('#ajax-loader').show();
   	var id = this.parentNode.parentNode.id;
	$.ajax({
		url: 'links/delete',
		type: 'post',
        data: {'id': id},
        success: function(data){
        	messages(data, "#messages");
        },
        error: function() {
            alert('Client DB is currently unavailable; please try again later.');
        },
        complete: function () {
        	refreshLinkContent();
        	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
        }
	});// ajax call
});	// END delete link

//GET update tbd 
$(document).on('click', '.linkUpdate',function(){
	// geting the id from table <tr> 
	var id = this.parentNode.parentNode.id;
	
    var text = $(this).parent().prev().text();
     $("#formLinkUpdate #url").val(text.trim())
     $("#editLinkModal").attr('data-info',id).modal('show');
        	
    
});	// END update tbd

//post update tbd
$(document).on('click', '#updateLink',function(){
       	$('#ajax-loader').show();
    	var $form = $('#formLinkUpdate');
        // let's select and cache all the fields
        var $inputs = $form.find("input");
        // serialize the data in the form
        var serializedData = $form.serialize();
        var id = $("#editLinkModal").attr('data-info');
    	$.ajax({
    		url: 'links/update?id='+id,
    		type: 'post',
            data: serializedData,
            success: function(data){
            	messages(data);
             },
            error: function() {
                alert('Client DB is currently unavailable; please try again later.');
            },
            complete: function () {
            	refreshLinkContent();
            	// messages will take care of the error messages and validation messages also if responsible for closing the #modal            	
            }
    	});// ajax call
});	// END add note

//************Images*******************************

function refreshImageContent(){
	$('#ajax-loader').show();
		
		$('#imageTable').load('images/all');
    
		$("#image").val('');
		$('#ajax-loader').hide();
}

//Add a new image 
$(document).on('click', '#addimage',function(){
   	$('#ajax-loader').show();

	$('#image').upload('images/upload', function(data) {
			messages(data, "#messages", true);
			refreshImageContent();
	    }, 'json');


});	// END add image

//view in modal 
$(document).on('click', '.imgthumb',function(e){
   	e.preventDefault();
   	src = $(this).attr("href");
   	img = $('#imgmod');
   	img.attr('src', src);
   	$("#imgModal").modal('show')
      
});	// END view in modal


$(document).on('click', '.imageDelete',function(e){
	var id = this.id;
	$("#confirm").attr('data-info',id).attr('data-type','img').modal('show');
	//the actual delete is up 
})

function AutoClosingAlert() {
	window.setTimeout(function() { 
 	   $(".alert").alert('close')}, 5000);
}// END function to autoclose the alerts 


 function messages(data, idName, parse){
	 parse = parse || false;
	 idName = idName || '.mod-err';
	 
	 $(".alert").alert('close');
	if (parse != true)
		data = $.parseJSON(data);
 	
	if (data.hasOwnProperty('message'))
 	{
 		var mess="";
 		mess = "<div class='alert alert-success alert-dismissable'>";
 		mess+="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
 		mess+=" <p>" + data['message'] + "</p></div>";
 		$(".modal").modal('hide');
 		$('#messages').html(mess);
 		AutoClosingAlert();
 		return true;
 	}
 	else 
 	{
 		var mess="";
 		mess =  "<div class='alert alert-danger alert-dismissable'>";
 		mess += "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
 		mess +=	"<ul class='list-unstyled'>";
 		for (var name in data) {	
 		     mess += "<li>" + data[name] + "</li>";
 		}

 		mess +=	"</ul>";
   		mess += "</div>";
   		
   		$(idName).html(mess);
   		AutoClosingAlert();
   		$('#ajax-loader').hide();
   		return false;
 	}
 	
 	
 	
 }   // END message procesing function  
