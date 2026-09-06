import 'package:flutter/material.dart';

import 'employee.dart';

class Page2 extends StatelessWidget {

  const Page2({Key? key}) : super(key: key);

  @override

  Widget build(BuildContext context) {
    final employee = ModalRoute.of(context)!.settings.arguments as Employee;

    return Scaffold(

        appBar: AppBar(

        title: const Text('Page 2'),

    centerTitle: true,

    ),
      body: Center(child: Column(children: [
        const SizedBox(height: 10),

        Text(employee.toString(), style: const TextStyle(color: Colors.lightGreen, fontSize: 24, fontWeight: FontWeight.bold)),

        const SizedBox(height: 10),

        ElevatedButton(onPressed: () {

          Navigator.of(context).pop();

        },

            child: const Icon(Icons.navigate_before, size: 50)

        )

      ]),

      ),

    );

  }

}