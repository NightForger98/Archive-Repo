import 'package:flutter/material.dart';

class roomRMap extends StatelessWidget {
  double x;
  double y;
  String currentMap;

  roomRMap({super.key, required this.x, required this.y, required this.currentMap});

  @override
  Widget build(BuildContext context) {
    if (currentMap == 'roomR') {
      return Container(
        alignment : Alignment(x, y),
        child:
        Image.asset(
          'assets/maps/roomR.png',
          width: MediaQuery.of(context).size.width *
              0.9,
          height: MediaQuery.of(context).size.height * 0.5 ,
          fit: BoxFit.fill,
        ),
      );
    } else {
      return Container();
    }
  }
}
