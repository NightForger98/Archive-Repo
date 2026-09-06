import 'package:flutter/material.dart';
import 'package:flutter/cupertino.dart';
import 'mid2Page.dart';
import 'itemPage.dart';
import 'multPage.dart';
import 'textPage.dart';
import 'carPage.dart';
import 'page1.dart';
import 'postMid/w11.dart';
import 'postMid/w12.dart';
import 'postMid/add_customer.dart';
import 'postMid/myProj/my_data.dart';

class MainMenu extends StatefulWidget{

  const MainMenu({super.key});
  @override
  State<MainMenu> createState() => _MainMenuState();

}
class _MainMenuState extends State<MainMenu>{

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

  @override
  Widget build (BuildContext context){
    return Scaffold(

        appBar: AppBar(

        title:
        const Text('Main Menu', style: TextStyle(color: Colors.grey, fontSize: 30),),
    centerTitle: true,
    backgroundColor: Colors.blueAccent,



    ),
    body: Center(
      child: Column(
        children: [
          const SizedBox(height: 10.0),
          const Text('Csci-410 Mobile Projects', style: TextStyle(fontSize: 24.0, color: Colors.deepPurple)),
          const SizedBox(height: 10.0),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.indigo,),
          Row(children: [
            Expanded(
              child: Container(
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(TextPage());
                  },
                  child: Text("Week1-2"),
                ),
              ),
            ),
            Expanded(
              child: Container(
                padding: EdgeInsets.only(left: 8.0),
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(MultPage());
                  },
                  child: Text("Week3-4"),
                ),
              ),
            )
          ],


          ),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.indigoAccent,),
          Row(children: [
            Expanded(
              child: Container(
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(CarPage());
                  },
                  child: Text("week5-6"),
                ),
              ),
            ),
            Expanded(
              child: Container(
                padding: EdgeInsets.only(left: 8.0),
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(Page1());
                  },
                  child: Text("week 7-8"),
                ),
              ),
            )
          ],


          ),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.blue,),
          Row(
            children: [
            Expanded(
              child: Container(
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(ItemPage());
                  },
                  child: Text("week9"),
                ),
              ),
            ),
            Expanded(
              child: Container(
                padding: EdgeInsets.only(left: 8.0),
                height: 50,
                child: ElevatedButton(
                  onPressed: () {
                    openPage(Mid2Page());
                  },
                  child: Text("week10 (mid)"),
                ),
              ),
            )
          ],


          ),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.blueAccent,),

          Row(
            children: [
              Expanded(
                child: Container(
                  height: 50,
                  child: ElevatedButton(
                    onPressed: () {
                      openPage(w11());
                    },
                    child: Text("Week 11"),
                  ),
                ),
              ),
              Expanded(
                child: Container(
                  padding: EdgeInsets.only(left: 8.0),
                  height: 50,
                  child: ElevatedButton(
                    onPressed: () {
                      openPage(w12());
                    },
                    child: Text("Week 12"),
                  ),
                ),
              )
            ],


          ),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.blueAccent,),
          Row(
            children: [
              Expanded(
                child: Container(
                  height: 50,
                  child: ElevatedButton(
                    onPressed: () {
                      openPage(AddCustomer());
                    },
                    child: Text("final sample"),
                  ),
                ),
              ),
              Expanded(
                child: Container(
                  padding: EdgeInsets.only(left: 8.0),
                  height: 50,
                  child: ElevatedButton(
                    onPressed: () {
                      openPage(MyData());
                    },
                    child: Text("My Phase 2"),
                  ),
                ),
              )
            ],


          ),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.blue,),
          Container(height: 40, width: MediaQuery.of(context).size.width, color: Colors.black12,

              child: Text('We breath hope', style: TextStyle(fontSize: 30, color: Colors.blueGrey), )),
          Container(height: 10, width: MediaQuery.of(context).size.width, color: Colors.blue,),

        ],
      ),
    ),
    );
  }
}