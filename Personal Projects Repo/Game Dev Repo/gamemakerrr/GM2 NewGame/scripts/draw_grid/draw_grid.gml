function draw_grid(_grid, _x, _y, _cell_width, _cell_height, _color) {

	//Init
	var _i = 0;
	var _j = 0;
	draw_set_halign(fa_center);
	draw_set_valign(fa_middle);
	draw_set_color(_color);

	//Draw the contents of the provided grid
	for (_i = 0; _i < (ds_grid_width(_grid)); _i++) {
		for (_j = 0; _j < (ds_grid_height(_grid)); _j++) {
			var _text = ds_grid_get(_grid, _i, _j);
			draw_text(_x + (_i * _cell_width + (_cell_width/2)), _y + (_j * _cell_height + (_cell_height/2)), string(_text)); 
		}
	}

	// Horizontal lines
	for (_i = 0; _i <= (ds_grid_height(_grid) * _cell_height); _i += _cell_height)
	{
	    draw_line(_x, _y+_i, _x+(ds_grid_width(_grid) * _cell_width), _y+_i);
	}
  
	// Vertical lines     
	for (_i = 0; _i <= (ds_grid_width(_grid) * _cell_width); _i += _cell_width)
	{
	    draw_line(_x+_i, _y, _x+_i, _y+(ds_grid_height(_grid) * _cell_height));
	}
	
}
