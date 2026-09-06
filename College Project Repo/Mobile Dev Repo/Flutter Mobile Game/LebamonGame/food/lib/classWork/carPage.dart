/*

Page to display the main interface of the application.

it displays the all widgets horizontally.

It allows the user to select the car model and price form a dropdown.

The user selects the warranty years form a radio group

The user can add car insurance via checkbox

The total price is automatically calculated when one of the widget's state changes

*/

import 'package:flutter/material.dart';

import 'car.dart';

class CarPage extends StatefulWidget {

  const CarPage({super.key});

  @override

  State<CarPage> createState() => _CarPageState();

}
class _CarPageState extends State<CarPage> {

  String totalPrice = cars.first.getTotalPrice(); // holds total car price

  Car car = cars.first; // set the first car to be displayed

  bool insurance = false; // holds insurance value and the default, is no insurance

  void updateCar(Car car) {

// updates car price when the user selects a car form the dropdown

    setState(() {

      this.car = car;

      totalPrice = car.getTotalPrice();

    });

  }

  void updateWarranty(int warranty) {

// updates warranty years when the user clicks on a radio buttons

    setState(() {

      car.warranty = warranty;

      totalPrice = car.getTotalPrice();

    });

  }
  @override

  Widget build(BuildContext context) {

    return Scaffold(

        body: Center(

            child: Column(children: [

              Container(height: 20.0,color: Colors.indigo,),
              Container(color: Colors.blue,height: 40,width: MediaQuery.of(context).size.width,
                child:

              const Text('Select Model', style: TextStyle(fontSize: 25.0), textAlign: TextAlign.center,),
              ),
              const SizedBox(height: 10.0),

              MyDropdownMenuWidget(updateCar: updateCar), const SizedBox(height: 10.0),

              WarrantyWidget(updateWarranty: updateWarranty), const SizedBox(height: 10.0),

              Row(

                  mainAxisAlignment: MainAxisAlignment.center,

                  children: [

                    const Text('Insurance', style: TextStyle(fontSize: 18.0)),

                    Checkbox(value: insurance, onChanged: (bool? value) {

                      setState(() { // updates the total price when the checkbox state chanes

                        insurance = value as bool;

                        car.insurance = insurance;

                        totalPrice = car.getTotalPrice();

                      });

                    })]),

              const SizedBox(height: 10.0),

              Text('Total Price: $totalPrice', style: const TextStyle(fontSize: 25.0, fontWeight: FontWeight.bold),),
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

            ])));

  }

}