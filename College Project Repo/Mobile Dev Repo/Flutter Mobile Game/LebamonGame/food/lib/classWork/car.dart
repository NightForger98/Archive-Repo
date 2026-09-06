
import 'package:flutter/material.dart';

class Car {

  String model;

  int price;

  int warranty = 1; // warranty years, default 1 year

  bool insurance = false; // determines if car is insured, default is false

// constructor only takes model and price. warranty and insurance are set later

  Car(this.model, this.price);

// toString method used to display an item in a dropdown widget

  @override

  String toString() {

    return '$model Price: \$$price';

  }

  String getTotalPrice() {

/*

calculate price as follows: if warranty is 1 then 5% else 10%

if insurance is added, then add 1000 to total price

*/

    int insuranceAmount = insurance ? 1000 : 0;

    if (warranty == 1) {

      return (price * 1.05 + insuranceAmount).toStringAsFixed(0);

    }

    return (price * 1.1 + insuranceAmount).toStringAsFixed(0);

  }

}
// a constant list of car objects. It is used to populate the items of

// dropdown widget

List<Car> cars = [

  Car('Honda', 10000),

  Car('Toyota', 20000),

  Car('BMW', 30000),

  Car('Hyundai', 8000)

];
class MyDropdownMenuWidget extends StatefulWidget {

  const MyDropdownMenuWidget({required this.updateCar, super.key});

// below is a callback function to return the selected car to the home page

// we will call it from the widget’s state class

  final Function(Car) updateCar;

  @override

  State<MyDropdownMenuWidget> createState() => _MyDropdownMenuWidgetState();

}
class _MyDropdownMenuWidgetState extends State<MyDropdownMenuWidget> {

/*

class to represent a dropdown of cars.

It is populated using the cars list.

It contains a callback function called updateCar to pass the selected car back

to the home page.

*/

  @override

  Widget build(BuildContext context) {

    return DropdownMenu(

        width: 210.0,

        initialSelection: cars[0], // first car to be displayed

        onSelected: (car) {

          setState(() {

            widget.updateCar(car as Car); // use widget to access widget fields from state class

          });

        }, // the list map function converts the list of cars to a list of DropdownMenuEntries

        dropdownMenuEntries: cars.map<DropdownMenuEntry<Car>>((Car car) {

          return DropdownMenuEntry(value: car, label: car.toString());

        }).toList());

  }

}

class WarrantyWidget extends StatefulWidget {

/*

class to represent radio button group for selecting warranty years

The default is one year

It includes a callback method called updateWarranty, to return the years to

home page.

*/

  const WarrantyWidget({required this.updateWarranty, super.key});

  final Function(int) updateWarranty;

  @override

  State<WarrantyWidget> createState() => WarrantyWidgetState();

}

class WarrantyWidgetState extends State<WarrantyWidget> {

  int _years = 1; // stores warranty years and is used so that both radio buttons belong to the same group

  @override

  Widget build(BuildContext context) {

// we add the radio group to a row widget, to arrange them horizontally

    return Row(mainAxisAlignment: MainAxisAlignment.center, children: [

      const Text('Warranty', style: TextStyle(fontSize: 18.0),),

      Radio( value: 1, groupValue: _years, // all radio buttons in the same group should share a common variable

        onChanged: (val) {

          setState(() {

            _years = val as int;

            widget.updateWarranty(_years); // use widget to access widget fields from state class
          });

        },

      ), const Text('1 year', style: TextStyle(fontSize: 18.0)),

      Radio( value: 5, groupValue: _years, // all radio buttons in the same group should share a common variable

        onChanged: (val) {

          setState(() {

            _years = val as int;

            widget.updateWarranty(_years); // use widget to access widget fields from state class
          });

        },

      ), const Text('5 years', style: TextStyle(fontSize: 18.0),)

    ]);

  }

}
