import 'package:flutter/material.dart';

class MyHero extends StatelessWidget {
   final int boySpriteCount;//0-1-2
   final String direction;
   final String location;
   double height = 20;

   MyHero({required this.boySpriteCount,required this.direction, required this.location});
   @override
   Widget build(BuildContext context) {
     if (location == 'StartMap') {
       height = 20;
     } else if (location == 'roomD' || location == 'roomL' || location == 'roomR') {
       height = 35;


     }

      return Container(

        height: height,
        child:
        Image.asset(
          'assets/boy/'+ direction + boySpriteCount.toString()+'.png',
          fit: BoxFit.cover,
        ),
      );
    }
  }



