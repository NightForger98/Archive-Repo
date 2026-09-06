import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'item.dart';
class ItemPage extends StatefulWidget{
  const ItemPage({super.key});
  @override
  State<ItemPage> createState() => _ItemPageState();
}
class _ItemPageState extends State<ItemPage>{
  @override
  Widget build (BuildContext context){
    double screenWidth = MediaQuery.of(context).size.width;
    if (MediaQuery.of(context).orientation== Orientation.landscape){
      screenWidth = screenWidth * 0.8;
    }
    return Scaffold(

      appBar: AppBar(

        title:
        const Text('Menu', style: TextStyle(color: Colors.grey, fontSize: 30),),
        centerTitle: true,
        backgroundColor: Colors.blueAccent,



      ),
      body:
              ShowItems(width: screenWidth,)
    );

  }
}