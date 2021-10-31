<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <div>
        <h4>Send Email</h4>
        <form id="myForm" action="" method="POST">
        <label>Name</label>
        <br>
        <input type="text" id="name" value="Motor Trade Butuan">
        <br>
        <input type="text" id="email" value="no-reply@motortrade.com.ph">
        <br>
        <input type="text" id="subject" value="Job Application - Phase 3">
        <br>
        <input type="text" id="email2" value="ralph.alfaras@urios.edu.ph">
        <br><br>
        <label>Message</label>
        <br>
        <textarea id="body" cols="30" rows="5">You are scheduled for an interview on MM-DD-YYYY 00:00PM.&#13;&#10;&#13;&#10;Your token is Y3YY.&#13;&#10;&#13;&#10;To join the video meeting, click this link: https://meet.google.com/xxx-xxxx-xxx&#13;&#10;&#13;&#10;Otherwise, to join by phone, dial +1 999-999-9999 and enter this PIN: 999 999 999#</textarea>
        <br>
        <button type="button" id="send_email">Submit</button>
        </form>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="/thesis_git/vendor/jquery/jquery.min.js"></script>
    <script>
        $(function(){
		$('#send_email').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){

				name = $('#name').val();
				email = $('#email').val();
                subject = $('#subject').val();
                body = $('#body').val();
                email2 = $('#email2').val();

				e.preventDefault();
                
                console.log(name+email+subject+body+email2);

				$.ajax({
					type: 'POST',
					url: "sendEmail.php",
					data: {name : name, email : email, subject : subject, body : body, email2 : email2},
					success: function(data){
            //console.log("passing :"+fname+mname+lname+gender+address1+ address2+city+state+ zip+"");
						console.log("data= "+data);
                    alert('Email Sent!');
					},
					error: function(data){
						alert('Something went wrong!');
					}
				});
				//test if true displays all data from fields-----tester
				//alert('true');
				//alert(firstname+lastname+course);
				$("form").trigger("reset");
			}
			else{
        
			}
		});
	});
    </script>
</body>
</html>