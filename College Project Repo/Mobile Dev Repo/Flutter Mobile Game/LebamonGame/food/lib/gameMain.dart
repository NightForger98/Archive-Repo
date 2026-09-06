import 'package:flutter/material.dart';
import 'package:food/Hero.dart';
import 'package:food/MyProf.dart';
import 'package:food/StartMap.dart';
import 'package:food/button.dart';
import 'dart:async';

import 'package:food/roomDMap.dart';
import 'package:food/roomLMap.dart';
import 'package:food/roomRMap.dart';
import 'package:food/chatFun.dart';
import 'package:food/classWork/mainMenu.dart';
import 'classWork/postMid/myProj/my_data.dart';
class GamePage extends StatefulWidget {
  const GamePage({super.key});

  @override
  State<GamePage> createState() => _GamePageState();
}

class _GamePageState extends State<GamePage> {

  double mapX=2.75;
  double mapY=1.25;
  String currentLocation = 'StartMap';
  double step = 0.25;
  int boySpriteCount =1;
  String boyDirection = 'S';
  double labX=0, labY=0;
  String profDirection = 'S';
  bool chatStarted = true;
  int countPressingA = 0;
  bool pcApp= false;

   double oakX=5;//-2.25
   double oakY=2;//-0.75  //Variables
  void openPage(Widget Page) {
    Widget page= MainMenu();
    page=Page;
    try {

      Navigator.of(context).push(

          MaterialPageRoute(builder: (context) => page,

          )

      );

    }

    catch(e) {

      // print(e); // better to remove print in release version

    }

  }
  @override

  void dispose() {
    super.dispose();

  }

  List<List<double>> noMansLandroomD =[[0,0],];
  List<List<double>> noMansLandStartMap = [//prof
    [-2,-0.5],
    [-2,-0.75],
    [-2.25,-0.5],
    [-2.25,-0.75],
    [-2.5,-0.5],
    [-2.5,-0.75],

    //sign
    [1.25,1.75],
    [1.5,1.75],
    [1.75,1.75],
    [1.25,1.5],
    [1.5,1.5],
    [1.75,1.5],
    //myhouse
    [2,1.5],
    [2.25,1.5],
    [2.5,1.5],
   // [2.75,1.5],
    [3,1.5],
    [3.25,1.5],
    [3.5,1.5],
    [3.75,1.5],
    [4,1.5],
    [4.25,1.5],
    [4.5,1.5],
    [4.75,1.5],
    [5,1.5],
    ///


    [2,3],
    [2.25,3.25],
    [2.5,3.25],
    [2.75,3.25],
    [3,3.25],
    [3.25,3.25],
    [3.5,3.25],
    [3.75,3.25],
    [4,3.25],
    [4.25,3.25],
    [4.5,3.25],
    [4.75,3.25],
    [5,3],
    [2.25,3.5],
    [2.5,3.5],
    [2.75,3.5],
    [3,3.5],
    [3.25,3.5],
    [3.5,3.5],
    [3.75,3.5],
    [4,3.5],
    [4.25,3.5],
    [4.5,3.5],
    [4.75,3.5],
    ///
    [2,1.5],
    [2,1.75],
    [2,2],
    [2,2.25],
    [2,2.5],
    [2,2.75],
    [2,3],
    [5,1.5],
    [5,1.75],
    [5,2],
    [5,2.25],
    [5,2.5],
    [5,2.75],
    [5,3],
    ///////neighbor
    //sign
    [-1.25,1.75],
    [-1.5,1.75],
    [-1.75,1.75],
    [-1.25,1.5],
    [-1.5,1.5],
    [-1.75,1.5],
    //myhouse
    [-2,1.5],
    [-2.25,1.5],
    [-2.5,1.5],
    [-2.75,1.5],
    //[-3,1.5],
    [-3.25,1.5],
    [-3.5,1.5],
    [-3.75,1.5],
    [-4,1.5],
    [-4.25,1.5],
    [-4.5,1.5],
    [-4.75,1.5],
    [-5,1.5],
    ///


    [-2,3],
    [-2.25,3.25],
    [-2.5,3.25],
    [-2.75,3.25],
    [-3,3.25],
    [-3.25,3.25],
    [-3.5,3.25],
    [-3.75,3.25],
    [-4,3.25],
    [-4.25,3.25],
    [-4.5,3.25],
    [-4.75,3.25],
    [-5,3],
    [-2.25,3.5],
    [-2.5,3.5],
    [-2.75,3.5],
    [-3,3.5],
    [-3.25,3.5],
    [-3.5,3.5],
    [-3.75,3.5],
    [-4,3.5],
    [-4.25,3.5],
    [-4.5,3.5],
    [-4.75,3.5],
    ///
    [-2,1.5],
    [-2,1.75],
    [-2,2],
    [-2,2.25],
    [-2,2.5],
    [-2,2.75],
    [-2,3],
    [-5,1.5],
    [-5,1.75],
    [-5,2],
    [-5,2.25],
    [-5,2.5],
    [-5,2.75],
    [-5,3],
    ////downhouse
    [0,-0.25],
    [0.25,-0.25],
    [0.5,-0.25],
    [0.75,-0.25],
    [1,-0.25],
    [1.25,-0.25],
    [1.5,-0.25],
    [1.75,-0.25],
    [2,-0.25],
    [2.25,-0.25],
    [2.5,-0.25],
    [2.75,-0.25],
    [3,-0.25],
    [3.25,-0.25],
    [3.5,-0.25],
    [3.75,-0.25],
    [4,-0.25],
    [4.25,-0.25],
    [4.5,-0.25],

    /////
    [0,-2.25],
    [0.25,-2.25],
    [0.5,-2.25],
    [0.75,-2.25],
    [1,-2.25],
    [1.25,-2.25],
    //[1.5,-2.25],
    [1.75,-2.25],
    [2,-2.25],
    [2.25,-2.25],
    [2.5,-2.25],
    [2.75,-2.25],
    [3,-2.25],
    [3.25,-2.25],
    [3.5,-2.25],
    [3.75,-2.25],
    [4,-2.25],
    [4.25,-2.25],
    [4.5,-2.25],

    //////////

    [4.5,-0.25],
    [4.5,-0.5],
    [4.5,-0.75],
    [4.5,-1],
    [4.5,-1.25],
    [4.5,-1.5],
    [4.5,-1.75],
    [4.5,-2],
    [4.5,-2.25],
    /////////

    [0,-0.25],
    [0,-0.5],
    [0,-0.75],
    [0,-1],
    [0,-1.25],
    [0,-1.5],
    [0,-1.75],
    [0,-2],
    [0,-2.25],
    ////
    [2,-2.5],
    [2.25,-2.5],
    [2.5,-2.5],
//////sign middle
    [-3.5,-0.75],
    [-3.75,-0.75],
    ///////////border

    [-4.25,-3.75],
    [-4,-3.75],
    [-3.75,-3.75],
    [-3.5,-3.75],
    [-3.25,-3.75],
    [-3,-3.75],
    [-2.75,-3.75],
    [-2.5,-3.75],
    [-2.25,-3.75],
    [-2,-3.75],
    [-1.75,-3.75],
    [-1.5,-3.75],
    [-1.25,-3.75],
    [-1,-3.75],
    [-0.75,-3.75],
    [-0.5,-3.75],
    [-0.25,-3.75],
    [-0.5,-3.75],
    [-0.25,-3.75],
    [0,-3.75],
    [4.25,-3.75],
    [4,-3.75],
    [3.75,-3.75],
    [3.5,-3.75],
    [3.25,-3.75],
    [3,-3.75],
    [2.75,-3.75],
    [2.5,-3.75],
    [2.25,-3.75],
    [2,-3.75],
    [1.75,-3.75],
    [1.5,-3.75],
    [1.25,-3.75],
    [1,-3.75],
    [0.75,-3.75],
    [0.5,-3.75],
    [0.25,-3.75],
    [0.5,-3.75],
    [0.25,-3.75],
    for (double i = 4.25; i <= 10; i += 0.25)

      [i,-3.75],
    for (double i = -3.25; i <= 5; i += 0.25)

      [6.75,i],
    for (double i = -6.5; i <= 6.5; i += 0.25)

      [i,4.75],
    for (double i = -4.75; i <= 5; i += 0.25)

      [-6.75,i],

  ];
  List<List<double>> dobList = [
    [2.75,1.25],
    for (double i = -1.75; i <= -2.75; i += 0.25)

      [i,-0.25],
    for (double i = -1.75; i <= -2.75; i += 0.25)

      [i,-1],
    for (double i = -2; i <= -0.25; i += 0.25)

      [-1.75,i],
    for (double i = -2; i <= -0.25; i += 0.25)

      [-2.75,i],


  ];

  double cleanNum(double num){
    return double.parse(num.toStringAsFixed(4));
  }
  bool canMoveTo(String direction, var noMansLand,double x,double y){
    double stepX =0;
    double stepY =0;

    if (direction == 'A') {
      stepX = step;
      stepY = 0;
    }else if (direction=='D' ){
      stepX= -step;
      stepY= 0;
    }else if (direction == 'W'){
      stepX=0;
      stepY= step;
    }else if (direction== 'S'){
      stepX=0;
      stepY= -step;
    }
    for(int i=0; i< noMansLand.length; i++){
      if(( cleanNum (noMansLand[i][0])== cleanNum(x + stepX))&&
          (cleanNum(noMansLand[i][1]) == cleanNum(y + stepY))){
        return false;
      }
    }
    return true;
  }
  bool chatStart(int countA,var dobList,double x, double y) {

    for (int i = 0; i < dobList.length; i++) {
      if ((cleanNum(dobList[i][0]) == cleanNum(x)) &&
          (cleanNum(dobList[i][1]) == cleanNum(y))) {
        return true;
      }
    }
    return false;

  }

  void termChat(){chatStarted = false;
    if(pcApp!=true)
  countPressingA=3;
  else
  countPressingA=6;}
  void turnBas(){
    if (currentLocation == 'StartMap') {
      profDirection = 'S';

      if (mapX >= -2.75 && mapX <= -1.75 && mapY == -0.25) {
        profDirection = 'W';
      }
      else if (mapY>= -2 && mapY < -0.25 && mapX == -2.75) {
        profDirection = 'D';
      }else if (mapY>= -2 && mapY < -0.25 && mapX == -1.75) {

        profDirection = 'A';}
    }else {profDirection ='S';}
  }
  void moveUp() {
    boyDirection = 'W';
    if (currentLocation == 'StartMap') {
      if (canMoveTo(boyDirection, noMansLandStartMap, mapX, mapY)) {
        setState(() {
          mapY += step;
          oakY +=step;
          turnBas();
          termChat();
        });
      }

      //enter room D
      if (double.parse((mapX).toStringAsFixed(4))==1.5
          && double.parse((mapY).toStringAsFixed(4))==-2.25){
        setState(() {
          currentLocation = 'roomD';
          labX=-0.75;
          labY=-5.5;

        });
      }
      //romL
      if (double.parse((mapX).toStringAsFixed(4))==2.75
          && double.parse((mapY).toStringAsFixed(4))==1.5){
        setState(() {
          currentLocation = 'roomL';
          labX=-5.25;
          labY=-5.25;

        });
      }
      //roomR
      if (double.parse((mapX).toStringAsFixed(4))==-3.0
          && double.parse((mapY).toStringAsFixed(4))==1.5){
        setState(() {
          currentLocation = 'roomR';
          labX=5.25;
          labY=-5.25;

        });
      }



      animateWalk();
    }
    //room d
    if (currentLocation == 'roomD' ||currentLocation == 'roomL' ||currentLocation == 'roomR') {
      if (canMoveTo(boyDirection, noMansLandroomD, labX, labY)) {
        setState(() {
          labY += step;
        });
      }


      animateWalk();
    }


  }
  void moveDown() {
    boyDirection = 'S';
    if (currentLocation == 'StartMap') {
      if (canMoveTo(boyDirection, noMansLandStartMap, mapX, mapY)) {
        setState(() {
          mapY -= step;
          oakY -=step;
          turnBas();
          termChat();
        });
      }

      animateWalk();
    }

    if (currentLocation == 'roomD'|| currentLocation == 'roomL' ||currentLocation == 'roomR') {
      if (canMoveTo(boyDirection, noMansLandroomD, labX, labY)) {
        setState(() {
          labY -= step;
        });
      }

      //leave room
      if (double.parse((labX).toStringAsFixed(4))==-0.75
          && double.parse((labY).toStringAsFixed(4))==-5.75){
        setState(() {
          currentLocation = 'StartMap';
          mapX=1.5;
          mapY=-2.5;

        });
      }  else  if (double.parse((labX).toStringAsFixed(4))==-5.25
          && double.parse((labY).toStringAsFixed(4))==-5.25){
        setState(() {
          currentLocation = 'StartMap';
          mapX=2.75;
          mapY=1.25;

        });
      }else if (double.parse((labX).toStringAsFixed(4))==5.25
          && double.parse((labY).toStringAsFixed(4))==-5.25){
        setState(() {
          currentLocation = 'StartMap';
          mapX=-3;
          mapY=1.25;

        });
      }
      animateWalk();
    }
  }
  void moveLeft() {
    boyDirection = 'A';
    if (currentLocation == 'StartMap') {
      if (canMoveTo(boyDirection, noMansLandStartMap, mapX, mapY)) {
        setState(() {
          mapX += step;
          oakX +=step;
          turnBas();
          termChat();
        });

      }

      animateWalk();
    }
    if (currentLocation == 'roomD' || currentLocation == 'roomL' ||currentLocation == 'roomR') {
      if (canMoveTo(boyDirection, noMansLandroomD, labX, labY)) {
        setState(() {
          labX += step;
        });
      }


      animateWalk();
    }
  }
  void moveRight() {
    boyDirection = 'D';
    if (currentLocation == 'StartMap') {
      if (canMoveTo(boyDirection, noMansLandStartMap, mapX, mapY)) {
        setState(() {
          mapX -= step;
          oakX -=step;
          turnBas();
          termChat();
        });
      }

      animateWalk();

    }
    if (currentLocation == 'roomD'|| currentLocation == 'roomL' ||currentLocation == 'roomR') {
      if (canMoveTo(boyDirection, noMansLandroomD, labX, labY)) {
        setState(() {
          labX -= step;
        });
      }
      animateWalk();
    }
  }
  void pressedA() {


    chatStarted=false;

    if (currentLocation == 'StartMap') {

      if (chatStart(countPressingA,dobList, mapX, mapY)) {

        chatStarted = true;
        setState(() {
          ++countPressingA;
          if(countPressingA==3 || countPressingA>=12){
            chatStarted=false;
          }

        });
              if (mapX == 2.75 && mapY == 1.25 && countPressingA >= 3) {
                countPressingA = 3;
              }
              if (pcApp == false && countPressingA > 6){
                chatStarted=false;

              }
          }
          }else if (currentLocation== 'roomL'||currentLocation== 'roomD'){
      if(labX==6 && labY==4.75){
        pcApp=true;
        openPage(MainMenu());
      }
      if(labX==-5.25 && labY==-3.25){
        pcApp=true;
        openPage(MyData());
      }
    }
    }
  void pressedB(){ setState(() {
    //b
  });}
  void animateWalk() {
    if (currentLocation == 'StartMap') {

      print('x: '+ mapX.toString() + ' , y: '+ mapY.toString());}
    else if (currentLocation == 'roomD' || currentLocation == 'roomL' ||currentLocation == 'roomR'){
      print('x: '+ labX.toString() + ' , y: '+ labY.toString());}
    Timer.periodic(const Duration(milliseconds: 50), (timer) {
      setState((){
        boySpriteCount++;

      });
      if(boySpriteCount == 4) {
        boySpriteCount=1;
        timer.cancel();
      }
    });
  }

  @override
  Widget build(BuildContext context) {
    return  Scaffold(
      body: Column(
        children: [
          AspectRatio(
            aspectRatio: 1,
            child:
            Container(
              color: Colors.black,
              child: Stack(
                children: [
                  StartMap(
                    x:mapX,
                    y:mapY,
                    currentMap: currentLocation,
                  ),

                  roomDMap(x:labX, y:labY,
                    currentMap: currentLocation,
                  ),
                  roomLMap(x:labX, y:labY,
                    currentMap: currentLocation,
                  ),
                  roomRMap(x:labX, y:labY,
                    currentMap: currentLocation,
                  ),

                  Container(
                    alignment: const Alignment(0,0),
                    child: MyProf(
                      location: currentLocation,
                      direction: profDirection,
                      x: oakX, y: oakY,

                    ),
                  ),


                  Container(
                    alignment: const Alignment(0,0),
                    child: MyHero(
                      location: currentLocation,
                      direction: boyDirection,
                      boySpriteCount: boySpriteCount,
                    ),
                  ),

                    Container(
                      alignment: const Alignment ( 0,0),
                      child: chatFun(
                        chat: chatStarted,
                        state: countPressingA,


                      ),
                    ),
                ],
              ),
           ),
          ),


          Expanded(

            child: Container(
              color: Colors.grey[900],
              child:  Padding(
                padding:  const EdgeInsets.all(20.0),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [

                    const Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [

                        Text('G A M E - B O Y', style: TextStyle(color: Colors.white)),
                        Text('♥', style: TextStyle(color: Colors.redAccent)),
                        Text('C S C I - 4 1 0', style: TextStyle(color: Colors.white)),
                      ],
                    ),


                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,


                      children: [

                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceEvenly,

                          children: [

                            Column(
                              children: [
                                const SizedBox(
                                  height: 50,
                                  width: 50,
                                ),

                                MyButton(
                                  text: '←',
                                  function: moveLeft,
                                ),
                                const SizedBox(
                                  height: 50,
                                  width: 50,
                                ),

                              ],
                            ),
                            Column(
                              children: [
                                MyButton(
                                  text: '↑',
                                  function: moveUp,
                                ),
                                const SizedBox(
                                  height: 50,
                                  width: 50,
                                ),
                                MyButton(
                                  text: '↓',
                                  function: moveDown,
                                ),

                              ],
                            ),
                            Column(
                              children: [
                                const SizedBox(
                                  height: 50,
                                  width: 50,
                                ),
                                MyButton(
                                  text: '→',
                                  function: moveRight,
                                ),
                                const SizedBox(
                                  height: 50,
                                  width: 50,
                                ),

                              ],
                            ),

                            Row(




                              children: [
                                const Column(
                                  children: [
                                    SizedBox(
                                      height: 50,
                                      width: 110,),
                                  ],
                                ),
                                Column(
                                  children: [


                                    MyButton(
                                      text: 'a',
                                      function: pressedA,
                                    ),
                                    const SizedBox(
                                      height: 70,
                                      width: 50,
                                    ),
                                  ],
                                ),
                                Column(
                                  children: [
                                    const SizedBox(
                                      height: 70,
                                      width: 50,
                                    ),


                                    MyButton(
                                      text: 'b',
                                      function: pressedB,
                                    ),
                                  ],
                                ),
                              ],
                            ),

                          ],
                        ),

                      ],
                    ),






                    const Text('N I G H T   F O R G E',style: TextStyle(fontSize: 18, fontStyle: FontStyle.italic , color: Colors.redAccent),),
                  ],
                ),

              ),
            ),
          ),

        ],
      ),
    );
  }


}