	
	$(function(){
		$('#register-btn').click(function(e){

            var valid = this.form.checkValidity();
            
			if(valid){

				var username = $('#username').val();
				var password = $('#password').val();
                var confirmPassword = $('#confirmPassword').val();
                var email = $('#email-acct').val();


				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'php/db-process.php',
					data: {username: username, password: password, confirmPassword: confirmPassword, email: email},
					success: function(data){
						alert('Registration Successful!');
					},
					error: function(data){
						alert('Registration Error!');
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


	$(function(){
		$('#start-btn').click(function(e){

            var valid = this.form.checkValidity();
            
			if(valid){

				var companyName = $('#comp-name').val();
				var chosenRegion = $('#region-list').val();
				var chosenCity = $('#city-list').val();
				var username = $('#bm-user').val();
				

				alert(companyName+chosenRegion+chosenCity+username);

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'game-process.php',
					data: {companyName: companyName, chosenRegion: chosenRegion, chosenCity: chosenCity, username: username},
					success: function(data){
						alert('Company Created!');
					},
					error: function(data){
						alert('Company Registration Error!');
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