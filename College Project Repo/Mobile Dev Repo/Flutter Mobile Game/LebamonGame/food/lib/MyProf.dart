import 'package:flutter/material.dart';

class MyProf extends StatelessWidget {
  final double x,y;
  final String direction;
  final String location;


  const MyProf({super.key, required this.x,required this.y, required this.direction, required this.location});
  @override
  Widget build(BuildContext context) {
    if (location == 'StartMap') {



      return Container(


        alignment: Alignment(x,y),
        child:
        Image.asset(
          'assets/doc/drBassel$direction.png',
          width: MediaQuery.of(context).size.width*0.9,
          height:MediaQuery.of(context).size.height*0.5,
          fit: BoxFit.cover,
        ),
      );
    }else {
      return Container();
    }
  }
}



