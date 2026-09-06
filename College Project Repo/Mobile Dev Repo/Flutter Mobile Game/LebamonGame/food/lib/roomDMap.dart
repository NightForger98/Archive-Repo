import 'package:flutter/material.dart';

class roomDMap extends StatelessWidget {
  double x;
  double y;
  String currentMap;

  roomDMap({super.key, required this.x, required this.y, required this.currentMap});

  @override
  Widget build(BuildContext context) {
    if (currentMap == 'roomD') {
      return Container(
        alignment : Alignment(x, y),
        child:
        Image.asset(
          'assets/maps/roomD.png',
          width: MediaQuery.of(context).size.width *
              0.9,
          height: MediaQuery.of(context).size.height * 0.5,
          fit: BoxFit.cover,
        ),
      );
    } else {
      return Container();
    }
  }
}


