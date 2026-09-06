import 'package:flutter/material.dart';

import 'employee.dart';
import 'page2.dart';

class Page1 extends StatefulWidget {

  const Page1({Key? key}) : super(key: key);

  @override

  State<Page1> createState() => _Page1State();

}

class _Page1State extends State<Page1> {

  final TextEditingController _controllerHours = TextEditingController();

  final TextEditingController _controllerRate = TextEditingController();
  void openPage2() {

    try {

      int hours = int.parse(_controllerHours.text);

      double rate = double.parse(_controllerRate.text);

      Navigator.of(context).push(

          MaterialPageRoute(builder: (context) => const Page2(),

// we send data using the settings and pass to it an Employee object

              settings: RouteSettings(arguments: Employee(hours, rate))

          )

      );

    }

    catch(e) {

     // print(e); // better to remove print in release version

    }

  }
  @override

  void dispose() {

    _controllerRate.dispose();

    _controllerHours.dispose();

    super.dispose();

  }


  @override

  Widget build(BuildContext context) {

    return Scaffold(

        appBar: AppBar(

        title: const Text('Page 1'),

    centerTitle: true,

    ),
      body: Center(child: Column(children: [
        const SizedBox(height: 10),

        SizedBox(width: 200, height: 50,

          child: TextField(controller: _controllerHours, keyboardType: TextInputType.number,

              decoration: const InputDecoration(border: OutlineInputBorder(), hintText: 'Enter hours')),

        ),

        const SizedBox(height: 10),

        SizedBox(width: 200, height: 50,

          child: TextField(controller: _controllerRate, keyboardType: TextInputType.number,

              decoration: const InputDecoration(border: OutlineInputBorder(), hintText: 'Enter rate')),

        ),

        const SizedBox(height: 10),

        ElevatedButton(onPressed: openPage2,

            child: const Icon(Icons.navigate_next, size: 50)

        ),

        const SizedBox(height: 10),
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

      ]),

      ),

    );

  }

}