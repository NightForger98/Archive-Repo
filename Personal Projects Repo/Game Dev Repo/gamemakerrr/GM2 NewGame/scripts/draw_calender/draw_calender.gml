

function draw_calender(_x, _y, _width, _height) {
	
	//Draw 2 triangles that you can click to shift the month
	var _x_offset        = 16;
	var _triangle_width  = _width / 10;
	var _triangle_height = _height / 4;
	
	draw_set_color(c_blue);
	draw_triangle(_x-_x_offset, _y+(_height-_triangle_height)/2, _x-_x_offset, _y+_triangle_height+(_height-_triangle_height)/2, _x-_x_offset-_triangle_width, _y+(_height/2), false);
	draw_triangle(_x+_x_offset+_width, _y+(_height-_triangle_height)/2, _x+_x_offset+_width, _y+_triangle_height+(_height-_triangle_height)/2, _x+_x_offset+_triangle_width+_width, _y+(_height/2), false);
	
	draw_set_color(c_white);
	draw_triangle(_x-_x_offset, _y+(_height-_triangle_height)/2, _x-_x_offset, _y+_triangle_height+(_height-_triangle_height)/2, _x-_x_offset-_triangle_width, _y+(_height/2), true);
	draw_triangle(_x+_x_offset+_width, _y+(_height-_triangle_height)/2, _x+_x_offset+_width, _y+_triangle_height+(_height-_triangle_height)/2, _x+_x_offset+_triangle_width+_width, _y+(_height/2), true);
	
	//Check if we are clicking the triangle
	if (mouse_check_button_pressed(mb_left)) {
		if (point_in_triangle(mouse_x, mouse_y, _x-_x_offset, _y+(_height-_triangle_height)/2, _x-_x_offset, _y+_triangle_height+(_height-_triangle_height)/2, _x-_x_offset-_triangle_width, _y+(_height/2))) {
			if (display_month == 1) {
				display_month = 12;
			}
			else {
				display_month -= 1;
			}
		
			update_calender();
		}
		else if (point_in_triangle(mouse_x, mouse_y, _x+_x_offset+_width, _y+(_height-_triangle_height)/2, _x+_x_offset+_width, _y+_triangle_height+(_height-_triangle_height)/2, _x+_x_offset+_triangle_width+_width, _y+(_height/2))) {
			if (display_month == 12) {
				display_month = 1;
			}
			else {
				display_month += 1;
			}
			
			update_calender();
		}
	}
	
	//Init
	var _cell_width = _width/ds_grid_width(display_calender);
	var _cell_height = _height/ds_grid_height(display_calender);

	var _start_date = date_get_weekday(date_create_datetime(current_year, display_month, 1, 1, 1, 1));
	
	var _column = _start_date-1;
	if (_column == -1) { _column = 6; }
	var _row    = 1;
	var _i      = 1;
	
	draw_set_alpha(0.5);
	
	//Draw contents/data of the date
	repeat(date_days_in_month(date_create_datetime(current_year, display_month, 1, 1, 1, 1))) {
		draw_set_color(ds_map_find_value(months_data[display_month], _i));
		draw_rectangle(_x+(_cell_width*_column), _y+(_cell_height*_row), _x+(_cell_width*(_column)+_cell_width), _y+(_cell_height*(_row)+_cell_height), false);
		_column++;
		if (_column == 7) {
			_column = 0;
			_row++;
		}
		_i++;
	}
	
	//Init
	draw_set_alpha(1);
	draw_set_color(c_white);
	draw_set_halign(fa_center);
	draw_set_valign(fa_center);
	
	//Draw
	draw_text(_x + _width/2, _y - 16, months[display_month]);
	draw_grid(display_calender, _x, _y, _cell_width, _cell_height, c_white);
	
}