<html>
<head>	
<title>JQuery CRUD</title>
<style> input{padding:10px;width:50%;margin-top:1%;} tr,td{border:1px 
	solid black;padding:5px;}</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body style="text-align:center;">
<!-- form Start-->	
<h1>User Information Form</h1>	
<form method="POST" action="" id="formID"> 
<input type="text" name="name" id="name" placeholder="Your Name"> <br>
<input type="email" name="email" id="email" placeholder="Email"> <br>
<input type="number" name="mobile" id="mobile" placeholder="+880"> <br>
<input type="submit" value="Send" id="JQSend"> 

</form>

<div id="msg"> </div>
<!-- form End-->	

<table id="table_output" 
style="padding:5px;text-align:center;width:50%;" align="center"></table>







<script>
	
	
//////// GET METHOD JQURY START //////////		
function showdata(){
	output = "";
	$.ajax({
		url: "get.php",
		method: "GET",
		dataType: 'json',
		success:function(data){
			console.log(data);
		/////////
		if(data){x = data;}
		else {x = ""}
		
		for(i=0; i < x.length; i++){
		//console.log(x[i].name);
			output +="<tr><td>" + x[i].name + "</td><td>" + x[i].email + 
			"</td><td>" + x[i].mobile + "</td></tr>";
			}
			
			$("#table_output").html(output);
			
		//////////////	
		}
		
		
		})
	}
showdata()	
//////// GET METHOD JQURY END //////////	


	
//////// INSERT METHOD JQURY //////////	
	
//#JQSend is submit value ID and "e" for event object
$("#JQSend").click(function(e){
e.preventDefault(); //stop reload when click submit button
//console.log("YAMIN"); //check console log if it works of not

// store values from action (remember target ID name only)
let nm = $("#name").val();
let em = $("#email").val();
let mb = $("#mobile").val();

/*
console.log(nm);
console.log(em);
console.log(mb);
*/

mydata = {myname:nm, myemail:em, myphone:mb};

//console.log(mydata);

//////////////////////
$.ajax({
	url:"insert.php",
	method: "POST",
	data: JSON.stringify(mydata),
	
	//print success data from insert.php message start
	success: function(data){
		console.log(data);
		
	//print data in html
	msg ="<div>"+ data + "</div>";
	$("#msg").html(msg);
	
	//clear the form
	$('#formID')[0].reset();
	
	//get data retry
	showdata()
			
	}
	//print success data from insert.php message end	

		});
//////////////////////

});
</script>



</body>
</html>
