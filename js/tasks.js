/*jQuery(function($) {
    $('form[data-async]').on('submit', function(event) {
        var $form = $(this);
        var $target = $($form.attr('data-target'));
 
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
 
            success: function(data, status) {
                $target.html(data);
            }
        });
 
        event.preventDefault();
    });
});
*/

function updateBadge(done,all,current) {
	var a = current.split("/");
	done = done+parseInt(a[0]);
	all = all +parseInt(a[1]);
	return done+"/"+all;
}

function sendAj(id,uid,what){
	
	
 var z = { id:id, uid:uid }; 
 
// window.alert("!!!! :: "+z); 
 
 var request = $.ajax({
        type: "POST",
        url: "/todo/a/done.php",
        data: z,
        dateType: 'json'
    });

  request.done(function(msg){
	 // $("#there").html(msg);
	 //alert("WORKS!!!"+msg);
	 // $("#outer").html(msg);
	  $(what+"t").addClass('success');
	  $(what+"c").prop('checked', true).prop('disabled', true);
	  //$(what+"c").prop('disabled', true);
	  $(what+"b").prop('disabled', true).addClass('hidden');
	  $(what+"d").prop('disabled', false).removeClass('hidden');
	  current = $("#badge").text();
	  $("#badge").text(updateBadge(1,0,current));
	  
  });

  request.fail(function(jqXHR,textStatus){
	  alert("Request failed: "+ textStatus);
  });
}

function clearFRM(){
	  $("#inputTask").val("");
	  $("#textNote").val("");	
}

function addAj(uid){
	var name = $("#inputTask").val();
	if (name.length>0) {
	var desc = $("#textNote").val();
	
	 var z = { uid:uid, name:name, desc:desc }; 
	 
	 var request = $.ajax({
	        type: "POST",
	        url: "/todo/a/add.php",
	        data: z,
	        dateType: 'json'
	    });

	  request.done(function(msg){
		 // $("#there").html(msg);
//		  alert("WORKS!!!"+msg);
		  id = msg;
		  table = $("#taskTable").html();
		  $("#taskTable").html(table+prepareTask(uid,id,name,desc));
		  $("#inputTask").val("");
		  $("#textNote").val("");
		  //here add another TR
		  
		  current = $("#badge").text();
		  $("#badge").text(updateBadge(0,1,current));
		  
	  });

	  request.fail(function(jqXHR,textStatus){
		  alert("Request failed: "+ textStatus);
	  });
	};
}


function prepareTask(uid,id,name,desc) {
	
	var tr = "<tr id=\"done"+id+"t\" ><td>" +
	"<input type=\"checkbox\" id=\"done"+id+"c\" value=\""+id+"\" "+
	"onclick=\"sendAj("+id+","+uid+",'#done"+id+"')\"/>"+
"</td>"+
"<td>"+name;
	
	if (desc.length>0) tr += "<br/><small><i>"+desc+"</i></small>";
	tr += "<button type=\"button\" id=\"done"+id+"b\" class=\"btn btn-primary pull-right\" "+
				"onclick=\"sendAj("+id+","+uid+",'#done"+id+"');\">"+
				"Done</button>"+
				"<button type=\"button\" id=\"done"+id+"d\" class=\"close hidden\" disabled "+ 
				 "onclick=\"sendDel("+id+","+uid+",'#done"+id+"')\">x</button>"+
		"</td></tr>" ;
return tr;
}





function sendDel(id,uid,what){
	
	
 var z = { id:id, uid:uid }; 
 
// window.alert("!!!! :: "+z); 
 
 var request = $.ajax({
        type: "POST",
        url: "/todo/a/delete.php",
        data: z,
        dateType: 'json'
    });

  request.done(function(msg){
	 // $("#there").html(msg);
//	  alert("WORKS!!!"+msg);
//	  $("#outer").html(msg);
	  $(what+"t").addClass('hidden');
	  $(what+"c").prop('checked', true).prop('disabled', true);
	  //$(what+"c").prop('disabled', true);
	  $(what+"d").prop('disabled', true).addClass('hidden');
	  current = $("#badge").text();
	  $("#badge").text(updateBadge(-1,-1,current));
  });

  request.fail(function(jqXHR,textStatus){
	  alert("Request failed: "+ textStatus);
  });
}



/**
 * used in history to move from past to today task!
 * @param id
 * @param uid
 * @param what
 */
function sendToday(id,uid,what){
	
	
	 var z = { id:id, uid:uid }; 
	 
	// window.alert("!!!! :: "+z); 
	 
	 var request = $.ajax({
	        type: "POST",
	        url: "/todo/a/move.php",
	        data: z,
	        dateType: 'json'
	    });

	  request.done(function(msg){
		  $(what+"c").prop('checked', true).prop('disabled', true);
		  $(what+"t").addClass('hidden');
		  $(what+"b").prop('disabled', true).addClass('hidden');
		  $(what+"d").prop('disabled', true).addClass('hidden');
		  current = $("#badge").text();
		  $("#badge").text(updateBadge(0,1,current));
	  });

	  request.fail(function(jqXHR,textStatus){
		  alert("Request failed: "+ textStatus);
	  });
	}
