import 'dart:ffi';

import 'package:animated_text_kit/animated_text_kit.dart';
import 'package:flutter/material.dart';
class chatFun extends StatelessWidget {
  bool chat;
  int state;
  List<String> currentText=[

        'press a to chat',

        'Fares: '
          '\n Finally,'
          '\n this already took too long...',

           'I wonder what to do... '
          '\n There is doctor bassel down there !'
          '\n I should talk to him.',

           '',//null state

          'Fares:'
          '\n Phase 1 is ready'
          '\n I am about to start the database',

           'Dr Bassel:'
          '\n Show me your work'
          '\n Come back when everything is ready',

         'The class notes are on my computer, \n I should go back to the house now',


        'That was everything we did in class, ',

  ' my data base is a simple game shop to be accessed from the lab',


     'The Lab is the big building behind you',


          'go there and access the computer',

        'password: FinalProject2\$',

  ];


  String getText(){
    if(state <= 12)
    return currentText.elementAt(state);
    else chat=false;
      return currentText.elementAt(3);
  }

  chatFun({super.key, required this.chat, required this.state,});


  @override
  Widget build(BuildContext context) {


    if (chat && (state !=3 || state <=12)) {
      return Container(
        width: MediaQuery
            .of(context)
            .size
            .width,
        height: MediaQuery
            .of(context)
            .size
            .height / 4,
        margin: const EdgeInsets.only(top: 285),
        padding: const EdgeInsets.all(20),
        color: Colors.white60,
        child:
        AnimatedTextKit(
          animatedTexts: [
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),//null state
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            TyperAnimatedText(getText()),
            //TyperAnimatedText(getText()),
            //TyperAnimatedText(getText()),
            //TyperAnimatedText(getText()),
           // TyperAnimatedText(getText()),
          ],
          pause: Duration(milliseconds: 2000),
          onFinished: getText,
          displayFullTextOnTap: true,
          stopPauseOnTap: false,
          isRepeatingAnimation: false,
          repeatForever: false,
          totalRepeatCount: 1,
        ),

      );
    }
    return Container();
  }
}



