import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class Item {
  final String _name;
  final double _price;
  final String _image;
  Item(this._name, this ._price, this._image);
  String get name => _name;
  double get price => _price;
  String get image => _image;


  @override
  String toString(){
    String space = '';
    for (int i=0; i<3 - _price.toString().length; i++){
      space += ' ';
    }
    return 'Price: \$$_price $space$_name';
  }
}
List<Item> items =[
  Item('Burger', 7,
  'https://images.unsplash.com/photo-1499028344343-cd173ffc68a9?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ),
  Item('Pizza', 10,
  'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=1381&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ),
  Item('Salad', 6,
  'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ),
  Item('Yoos', 5,
  'https://images.unsplash.com/photo-1609951651556-5334e2706168?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ),
];
class ShowItems extends StatelessWidget{
  const ShowItems({required this.width,Key? key}) : super(key: key);
  final double width;
  @override
  Widget build(BuildContext context){
    return ListView.builder(
        padding:  const EdgeInsets.all(10),
        itemCount: items.length,
        itemBuilder: (context, index){
          return
            Column(
              children:[
            Container(
            child:

          Column(
          children: [
            const SizedBox(height: 10),
            SizedBox(width: width * 0.28,),
            Text(items[index].toString(), style:  const TextStyle(fontSize: 18),),
            const SizedBox(height: 10,),
            Image.network(items[index].image,
            height: width * 0.3,),
            const SizedBox(height: 10,),
          ],

          ),
            ),
                Container(
                  padding: EdgeInsets.only(left: 8.0),
                  height: 20, width: 40,
                  child: ElevatedButton(
                    onPressed: () {
                      Navigator.of(context).pop();
                    },
                    child: Text("Home", style: TextStyle(fontSize: 16),),
                  ),
                ),
          ],);
    },);

  }
}
