//Every time we have a new month/calender
//Run this script
function create_calender(_days_ahead){
	
	//Init names for months
	months[0]  = "Months:";
	months[1]  = "January";
	months[2]  = "February";
	months[3]  = "March";
	months[4]  = "April";
	months[5]  = "May";
	months[6]  = "June";
	months[7]  = "July";
	months[8]  = "August";
	months[9]  = "September";
	months[10] = "October";
	months[11] = "November";
	months[12] = "December";
	
	//Which month we are displaying
	//Numeric
	display_month = 1;
	
	//Use this script everytime we update the calender
	//This is the first time we use the calender, and we also
	//need to update here
	update_calender();
	
	//This variable is used so every date before this one, is grey
	//And every date with this, or after is white
	//The date is rounded up so it starts at monday always
	var _current_time_ahead = date_create_datetime(current_year, current_month, current_day-7+_days_ahead+(7-date_get_weekday(date_current_datetime())), 1, 1, 1);
	
	//For every month
	var _i = 1;
	repeat(array_length(months)-1) {
		//We store alle the data in this array, each entry
		//is a ds_map containing all data for each month
		months_data[_i] = ds_map_create();
		
		//Here we fill the ds_map with a key matching a
		//date in the month matching
		var _j = 1;
		repeat(date_days_in_month(date_create_datetime(current_year, _i, 1, 1, 1, 1))) {
			
			var _at_time = date_create_datetime(current_year, _i, _j, 1, 1, 1);
			
			if (date_compare_datetime(_at_time, _current_time_ahead) == -1) {
				ds_map_set(months_data[_i], _j, c_grey);
			}
			else {
				ds_map_set(months_data[_i], _j, c_white);
			}
	
			_j++;
		}
		
		_i++;
	}
	
}