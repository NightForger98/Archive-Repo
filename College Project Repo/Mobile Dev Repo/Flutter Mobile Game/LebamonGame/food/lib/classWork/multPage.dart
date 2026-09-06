import 'package:flutter/material.dart';

class MultPage extends StatefulWidget {

  const MultPage({Key? key}) : super(key: key);

  @override

  State<MultPage> createState() => _MultPageState();

}
class MyTextField extends StatelessWidget {

  final Function(String) f; // hold a variable function

  final String hint; // holds the hintText of the TextField

  const MyTextField({required this.hint, required this.f, super.key,});

  @override

  Widget build(BuildContext context) {

    return
      Container(width: 300.0, height: 50.0,color: Colors.white70,

      child: TextField(

        style: const TextStyle(fontSize: 18.0, backgroundColor: Colors.pink),

        decoration: InputDecoration(

            border: const OutlineInputBorder(), hintText: hint

        ),

        onChanged: (text) { f(text);}, // call the variable function

      ),

    );

  }

}
class _MultPageState extends State<MultPage> {

// A field to hold the TextField’s text

  String _text = '';
  double _x = -1, _y = -1;
  // the first image to be displayed when we run the application

  String image = 'assets/other/img1.png';

// add a list of image assets

  List<String> images = [

    'assets/other/img1.png',

    'assets/other/img2.jpg',

    'assets/other/img3.jpg',

    'assets/other/img4.jpg',

    'assets/other/img5.jpg'

  ];

// a static counter to keep track of which image will be displays when we press the button

  static int count = 0;

// The updateText method will be called when the text in the TextField changes

  void updateText(String text) {
// we need to call the setState method, so that the state class will redraw the widget

    setState(() {
      _text = text;
      if (_x == -1 || _y == -1) {

        _text = 'Please fill all fields';

      }

      else {

        _text = (_x + _y).toString();

      }
      // set new image from the images list using counter as index

      image = images[count];

// update counter so that it doesn't exceed list length - 1

      count = (count + 1) % images.length;
    });

  }//end meth1
  void updateX(String x) {

    if (x.trim() == '') {

      _x = -1;

    }

    else {

      _x = double.parse(x);

    }

  }//end meth2

  void updateY(String y) {

    if (y.trim() == '') {

      _y = -1;

    }

    else {

      _y = double.parse(y);

    }

  }//end meth3
  ///////


  @override
  Widget build(BuildContext context) {
    return Scaffold(

        appBar: AppBar(

          title: const Text('Mult Page'),

          centerTitle: true,


        ),

        body: Center(

          child: Column(

            children: [

              const SizedBox(height: 10.0),

              Text('Math for dummies: $_text', style: const TextStyle(fontSize: 18.0, color: Colors.greenAccent)),

              const SizedBox(height: 10.0),

              MyTextField(f: updateX, hint: 'Enter X'),

              const SizedBox(height: 10.0),

              MyTextField(f: updateY, hint: 'Enter Y'),

              const SizedBox(height: 10.0),

              ElevatedButton(onPressed: () {updateText(_text);},
                  child: const Text('SUM', style: TextStyle(fontSize: 24.0),)),
              Image.asset(image, width: 250.0, height: 250.0),
              const SizedBox(height: 10.0),
              Container(
                padding: EdgeInsets.only(left: 8.0),
                height: 20, width: 20,
                child: ElevatedButton(
                  onPressed: () {
                    Navigator.of(context).pop();
                  },
                  child: Text("Home"),
                ),
              ),// add image to screen



            ],

          ),

        )

    );

  }
}