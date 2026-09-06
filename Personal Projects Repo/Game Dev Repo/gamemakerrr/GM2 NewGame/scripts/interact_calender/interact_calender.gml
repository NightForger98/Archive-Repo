
function interact_calender(_x, _y, _cell_width, _cell_height, _grid) {
	
	var _n = ds_grid_width(_grid);
	var _m = ds_grid_height(_grid);
	
	//Check if the mouse is within the bounds of the calender
	//If not, exit this script
	if !(point_in_rectangle(mouse_x, mouse_y, _x, _y, _x + (_cell_width*_n), _y + (_cell_height*_m))) {
		exit;
	}
	
	//Find which cell the mouse is within
	var _x_cell = clamp(ceil((mouse_x-_x)/_cell_width) -1, 0, _n-1);
	var _y_cell = clamp(ceil((mouse_y-_y)/_cell_height)-1, 0, _m-1);

	//If we click the cell/date within the calender
	if (mouse_check_button_released(mb_left)) {
		
		//Get whatever data that is in the calender at this date
		//Here color is used, you can replace with whatever data you want
		var _current_color = ds_map_find_value(months_data[display_month], ds_grid_get(display_calender, _x_cell, _y_cell));
		
		//Here we just change the white dates/squares to green, and back
		if (_current_color == c_white) {
			ds_map_set(months_data[display_month], ds_grid_get(display_calender, _x_cell, _y_cell), c_green);
		}
		else if (_current_color == c_green) {
			ds_map_set(months_data[display_month], ds_grid_get(display_calender, _x_cell, _y_cell), c_white);
		}
	}
}