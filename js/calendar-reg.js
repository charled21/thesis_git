	
	$(document).ready(function() {


		const monthNames = ["January", "February", "March", "April", "May", "June",
		  "July", "August", "September", "October", "November", "December"
		];
		
		  var qntYears = 40;
		  var selectYear = $("#year");
		  var selectMonth = $("#month");
		  var selectDay = $("#day");
		  var currentYear = new Date().getFullYear();


		  for (var y = 0; y < qntYears; y++){
			let date = new Date(currentYear);
			var yearElem = document.createElement("option");
			yearElem.value = currentYear 
			yearElem.textContent = currentYear;
			selectYear.append(yearElem);
			currentYear--;
		  } 
		
		  for (var m = 0; m < 12; m++){
			  let monthNum = new Date(2020, m).getMonth()
			  let month = monthNames[monthNum];
			  var monthElem = document.createElement("option");
			  monthElem.value = monthNum; 
			  monthElem.textContent = month;
			  selectMonth.append(monthElem);
			}
		
			var d = new Date();
			var month = d.getMonth();
			var year = d.getFullYear();
			var day = d.getDate();
		
			//selectYear.val(year); 
			//selectYear.on("change", AdjustDays);  
			selectMonth.val(month);    
			selectMonth.on("change", AdjustDays);
		
			AdjustDays();
			selectDay.val(day)
			
			function AdjustDays(){
			  var year = selectYear.val();
			  var month = parseInt(selectMonth.val());
			  selectDay.empty();
			  
              var full_months = [0,2,4,6,7,10,12];
			  if(month==1){
			   	var febDays = new Date(year, month, 28).getDate();

			   	for (var d = 1; d <= febDays; d++){
				 var dayElem = document.createElement("option");
				 dayElem.value = d; 
				 dayElem.textContent = d;
				 selectDay.append(dayElem);
			   	}
			   }
               else if(month==0 || month==2 || month==4 || month==6 || month==7 || month==9 || month==11){
                var fullDays = new Date(year, month, 31).getDate(); 
                for (var d = 1; d <= fullDays; d++){
                    var dayElem = document.createElement("option");
                    dayElem.value = d; 
                    dayElem.textContent = d;
                    selectDay.append(dayElem);
                  }
               }
               else{
                var part_Days = new Date(year, month, 30).getDate(); 
                for (var d = 1; d <= part_Days; d++){
                    var dayElem = document.createElement("option");
                    dayElem.value = d; 
                    dayElem.textContent = d;
                    selectDay.append(dayElem);
                  }
              }
			  
			  
			  
			  

			}    
		});