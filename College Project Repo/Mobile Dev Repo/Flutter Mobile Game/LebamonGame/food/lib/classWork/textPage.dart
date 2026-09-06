import 'package:flutter/material.dart';
import 'multPage.dart';
class TextPage extends StatefulWidget {

  const TextPage({Key? key}) : super(key: key);

  @override

  State<TextPage> createState() => _TextPageState();

}
class _TextPageState extends State<TextPage> {
  String _text = '';
  void updateText(String text) {
// we need to call the setState method, so that the state class will redraw the widget
    setState(() {
      _text = text;});}
  @override

  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.red,
      appBar: AppBar(
        title: Text('text page'),
        centerTitle: true,
        backgroundColor: Colors.greenAccent,
        foregroundColor: Colors.blue,
      ),

        body:
          Center(

        child: Column(

        children: [

          const SizedBox(height: 10.0),
          const Text('In His Name', style: TextStyle(fontSize: 18.0, color: Colors.deepPurple)),


          const SizedBox(height: 20.0),

    Text('You typed: $_text', style: const TextStyle(fontSize: 18.0, color: Colors.yellowAccent)),

    const SizedBox(height: 20.0,),

          MyTextField(f: updateText, hint: 'Enter some text'),
          const SizedBox(height: 20.0),

          MyTextField(f: updateText, hint: 'Enter some text'),

              const SizedBox(height: 20.0,),

              SizedBox(width: 300.0, height: 50.0,

                child: TextField(

                  style: const TextStyle(fontSize: 18.0,color: Colors.pinkAccent ),

                  decoration: const InputDecoration(

                      border: OutlineInputBorder(), hintText: 'Enter some text'

                  ),

                  onChanged: (text) {
                    updateText(text);
                  }, // call the updateText function

                ),

              ),
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
          ),

            ]
          ),
    ),

      );

  }
}