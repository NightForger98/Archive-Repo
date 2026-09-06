import 'package:flutter/material.dart';

class StartMap extends StatelessWidget {
  double x;
  double y;
  String currentMap;

  StartMap({super.key, required this.x, required this.y, required this.currentMap});

  @override
  Widget build(BuildContext context) {
    if (currentMap == 'StartMap') {
      return Container(
          alignment : Alignment(x, y),
      child:
      Image.asset(
        'assets/StartMap.png',
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


