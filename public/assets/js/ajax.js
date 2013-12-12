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
});	// END add note
   



// delete note
$(document).on('click', '.noteDelete',function(){
    	// geting the id from table <tr> 
		var id = this.parentNode.parentNode.id;
		$("#confirm").attr('data-info',id).attr('data-type','note').modal('show');
    
});	// END confirmation delete note

$(document).on('click', '#confirmOk',function(){
	id= $("#confirm").attr('data-info');
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
	
});// end actual delete


//update get note and place it into modal
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


//POST update note 
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






function AutoClosingAlert() {
	window.setTimeout(function() { 
 	   $(".alert").alert('close')}, 5000);
}// END function to autoclose the alerts 


 function messages(data){
	 $(".alert").alert('close');
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
   		
   		$('.mod-err').html(mess);
   		AutoClosingAlert();
   		return false;
 	}
 	
 	
 	
 }   // END message procesing function  
