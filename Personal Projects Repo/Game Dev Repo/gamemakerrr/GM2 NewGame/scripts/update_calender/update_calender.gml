//Run this when you need to show
//a new month
function update_calender() {
	
	//This grid is only for displaying the date
	display_calender = ds_grid_create(7, 7);
		ds_grid_set(display_calender, 0, 0, "mon");
		ds_grid_set(display_calender, 1, 0, "tue");
		ds_grid_set(display_calender, 2, 0, "wed");
		ds_grid_set(display_calender, 3, 0, "thu");
		ds_grid_set(display_calender, 4, 0, "fri");
		ds_grid_set(display_calender, 5, 0, "sat");
		ds_grid_set(display_calender, 6, 0, "sun");
	
	//Set every cell in calender to " " instead of the default '0'
	var _n = 0;
	var _m = 1;
	for (_n = 0; _n < (ds_grid_width(display_calender)); _n++) {
		for (_m = 1; _m < (ds_grid_height(display_calender)); _m++) {
			ds_grid_set(display_calender, _n, _m, " ");
		}
	}
	
	//This is just so we start in the right cell
	//So we match the day name
	var _start_date = date_get_weekday(date_create_datetime(current_year, display_month, 1, 1, 1, 1));
	
	var _column = _start_date-1;
	if (_column == -1) { _column = 6; }
	var _row    = 1;
	var _i      = 1;
	
	//This fills the grid with day/date number
	//Matching with the name of the days
	repeat(date_days_in_month(date_create_datetime(current_year, display_month, 1, 1, 1, 1))) {
		//Set the date
		ds_grid_set(display_calender, _column, _row, _i);
		_column++;
		if (_column == 7) {
			_column = 0;
			_row++;
		}
		_i++;
	}
	
}