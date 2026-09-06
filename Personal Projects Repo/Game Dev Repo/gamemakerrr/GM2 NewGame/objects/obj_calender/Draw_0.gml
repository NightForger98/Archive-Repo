var _cell_width  = 64;
var _cell_height = 32;
var _width       = ds_grid_width (display_calender)*_cell_width;
var _height      = ds_grid_height(display_calender)*_cell_height;
var _x           = (room_width -_width)/2;
var _y           = (room_height-_height)/2;;

interact_calender(_x, _y, _cell_width, _cell_height, display_calender);

draw_calender(_x, _y, _width, _height);
