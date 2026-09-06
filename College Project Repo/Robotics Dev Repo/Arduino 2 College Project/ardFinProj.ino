#include<SoftwareSerial.h>
#include <Servo.h>


//music
#define NOTE_B0  31
#define NOTE_C1  33
#define NOTE_CS1 35
#define NOTE_D1  37
#define NOTE_DS1 39
#define NOTE_E1  41
#define NOTE_F1  44
#define NOTE_FS1 46
#define NOTE_G1  49
#define NOTE_GS1 52
#define NOTE_A1  55
#define NOTE_AS1 58
#define NOTE_B1  62
#define NOTE_C2  65
#define NOTE_CS2 69
#define NOTE_D2  73
#define NOTE_DS2 78
#define NOTE_E2  82
#define NOTE_F2  87
#define NOTE_FS2 93
#define NOTE_G2  98
#define NOTE_GS2 104
#define NOTE_A2  110
#define NOTE_AS2 117
#define NOTE_B2  123
#define NOTE_C3  131
#define NOTE_CS3 139
#define NOTE_D3  147
#define NOTE_DS3 156
#define NOTE_E3  165
#define NOTE_F3  175
#define NOTE_FS3 185
#define NOTE_G3  196
#define NOTE_GS3 208
#define NOTE_A3  220
#define NOTE_AS3 233
#define NOTE_B3  247
#define NOTE_C4  262
#define NOTE_CS4 277
#define NOTE_D4  294
#define NOTE_DS4 311
#define NOTE_E4  330
#define NOTE_F4  349
#define NOTE_FS4 370
#define NOTE_G4  392
#define NOTE_GS4 415
#define NOTE_A4  440
#define NOTE_AS4 466
#define NOTE_B4  494
#define NOTE_C5  523
#define NOTE_CS5 554
#define NOTE_D5  587
#define NOTE_DS5 622
#define NOTE_E5  659
#define NOTE_F5  698
#define NOTE_FS5 740
#define NOTE_G5  784
#define NOTE_GS5 831
#define NOTE_A5  880
#define NOTE_AS5 932
#define NOTE_B5  988
#define NOTE_C6  1047
#define NOTE_CS6 1109
#define NOTE_D6  1175
#define NOTE_DS6 1245
#define NOTE_E6  1319
#define NOTE_F6  1397
#define NOTE_FS6 1480
#define NOTE_G6  1568
#define NOTE_GS6 1661
#define NOTE_A6  1760
#define NOTE_AS6 1865
#define NOTE_B6  1976
#define NOTE_C7  2093
#define NOTE_CS7 2217
#define NOTE_D7  2349
#define NOTE_DS7 2489
#define NOTE_E7  2637
#define NOTE_F7  2794
#define NOTE_FS7 2960
#define NOTE_G7  3136
#define NOTE_GS7 3322
#define NOTE_A7  3520
#define NOTE_AS7 3729
#define NOTE_B7  3951
#define NOTE_C8  4186
#define NOTE_CS8 4435
#define NOTE_D8  4699
#define NOTE_DS8 4978
#define REST 0
int tempo = 500;
int melody2[] = {


  // Hedwig's theme fromn the Harry Potter Movies
  // Socre from https://musescore.com/user/3811306/scores/4906610
  
  REST, 2, NOTE_D4, 4,
  NOTE_G4, -4, NOTE_AS4, 8, NOTE_A4, 4,
  NOTE_G4, 2, NOTE_D5, 4,
  NOTE_C5, -2, 
  NOTE_A4, -2,
  NOTE_G4, -4, NOTE_AS4, 8, NOTE_A4, 4,
  NOTE_F4, 2, NOTE_GS4, 4,
  NOTE_D4, -1, 
  NOTE_D4, 4,

  NOTE_G4, -4, NOTE_AS4, 8, NOTE_A4, 4, //10
  NOTE_G4, 2, NOTE_D5, 4,
  NOTE_F5, 2, NOTE_E5, 4,
  NOTE_DS5, 2, NOTE_B4, 4,
  NOTE_DS5, -4, NOTE_D5, 8, NOTE_CS5, 4,
  NOTE_CS4, 2, NOTE_B4, 4,
  NOTE_G4, -1,
  NOTE_AS4, 4,
     
  NOTE_D5, 2, NOTE_AS4, 4,//18
  NOTE_D5, 2, NOTE_AS4, 4,
  NOTE_DS5, 2, NOTE_D5, 4,
  NOTE_CS5, 2, NOTE_A4, 4,
  NOTE_AS4, -4, NOTE_D5, 8, NOTE_CS5, 4,
  NOTE_CS4, 2, NOTE_D4, 4,
  NOTE_D5, -1, 
  REST,4, NOTE_AS4,4,  

  NOTE_D5, 2, NOTE_AS4, 4,//26
  NOTE_D5, 2, NOTE_AS4, 4,
  NOTE_F5, 2, NOTE_E5, 4,
  NOTE_DS5, 2, NOTE_B4, 4,
  NOTE_DS5, -4, NOTE_D5, 8, NOTE_CS5, 4,
  NOTE_CS4, 2, NOTE_AS4, 4,
  NOTE_G4, -1, 
  
};
int notes = sizeof(melody2) / sizeof(melody2[0]) / 2;
int wholenote = (60000 * 4) / tempo;

int divider = 0, noteDuration = 0;
///////
const int PIEZO =10;
const int servoPIN = 13;
int melody[] = {262, 196, 196, 220, 196, 0, 247, 262}; // 8 music notes
SoftwareSerial bt(12,11); /* (Rx,Tx) */ 
int sensorValue = 0;
int tmpValue = 0; 
int noteDurations[] = {250, 125, 125, 250, 250, 250, 250, 250};
double cm = 0, inches = 0;
#define SIGNAL_PIN 2
const int button = 4;
int state = 0;
bool scanning = false;
bool moving = false;
int brightness = 0;
int celsius = 0;

int fahrenheit = 0;
Servo servo;

int angle = 90;

void setup() {
  pinMode(A0, INPUT); //optional
pinMode(A1, INPUT); // sensor pin
pinMode(SIGNAL_PIN, INPUT);
pinMode(7, OUTPUT); // TRIG

pinMode(6, INPUT); // ECHO
bt.begin(9600);

Serial.begin(9600);
pinMode(3, OUTPUT); // Led pin
pinMode(5, OUTPUT); // Led pin
pinMode(9, OUTPUT); // Led pin
pinMode(8, OUTPUT); // Led pin
pinMode(button, INPUT);
servo.attach(servoPIN);


pinMode(PIEZO, OUTPUT);
for (int i = 0; i < 8; i++) {
 
  tone(PIEZO, melody[i], noteDurations[i]); // play a note

  delay(noteDurations[i]* 1.3);

  noTone(PIEZO); // stop the tone playing

  }

}

void loop() {
  if(digitalRead(button)==HIGH){
    state++;
    delay(500);
    if(state == 1){
     Serial.println(" Searching: ... \t ...\t...\t... \n");
     scanning = true;
     moving = false;
 
    }
    else if (state == 2 ){
      Serial.println(" Moving... \t ...\t...\t... \n");
    digitalWrite(3,LOW);
    digitalWrite(5,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    scanning = false;
    moving = true;
      for (int thisNote = 0; thisNote < notes * 2; thisNote = thisNote + 2) {

    // calculates the duration of each note
    divider = melody2[thisNote + 1];
    if (divider > 0) {
      // regular note, just proceed
      noteDuration = (wholenote) / divider;
    } else if (divider < 0) {
      // dotted notes are represented with negative durations!!
      noteDuration = (wholenote) / abs(divider);
      noteDuration *= 1.5; // increases the duration in half for dotted notes
    }

    // we only play the note for 90% of the duration, leaving 10% as a pause
    tone(PIEZO, melody2[thisNote], noteDuration*0.9);

    // Wait for the specief duration before playing the next note.
    delay(noteDuration);
    
    // stop the waveform generation before the next note.
    noTone(PIEZO);
  }
     
   
 }

    
   else if(state >= 3 || state == 0){
    state = 0;
     Serial.println(" Robot Offline... \t ...\t...\t...\n");
    digitalWrite(3,LOW);
    digitalWrite(5,LOW);
    digitalWrite(9,LOW);
    digitalWrite(8,LOW);
    scanning = false;
    moving = false;
     if (bt.available()) /* If data is available on serial port */
    {
    	Serial.write(bt.read());      /* Print character received on to the serial monitor */
    }
  }
  else{ state = 0;}
  }
  if( scanning ==true){
    celsius = map(((analogRead(A0) - 20) * 3.04), 0, 1023, -40, 125);
    fahrenheit = celsius * 9 / 5 + 32;
   Serial.println("//////////// \t //////////// \t ////////// "); 
Serial.print("Temprature: ");
Serial.print(celsius);

Serial.print(" C, ");
Serial.print(fahrenheit);

Serial.println(" F");
tmpValue = analogRead(A0);
analogWrite(5, map(tmpValue, 0, 1023, 0, 255));
sensorValue = analogRead(A1);
// print the sensor reading
Serial.print("Brightness: ");
Serial.println(sensorValue);

// map the sensor reading to the range [0…255] to set the LED

// brightness using analogWrite()
sensorValue = 1023 - sensorValue ;
analogWrite(9, map(sensorValue, 0, 1023, 0, 255));

  



cm = readUltrasonicDistance(7, 6);
//servo
if(cm <= 10){
      angle = 135;
    }else angle = 90;
  servo.write(angle);

Serial.print("Object Distance: ");

Serial.print(cm);

Serial.print(" cm, ");

inches = cm / 2.54; // convert to inches by dividing by 2.54

Serial.print(inches);

Serial.println(" inches.");
//ir mod
  if(digitalRead(SIGNAL_PIN)==HIGH) {
    Serial.println("Movement detected.");
    digitalWrite(8, HIGH);
  } else {
    Serial.println("Did not detect movement.");
     digitalWrite(8, LOW);
  }
Serial.println("//////////// \t //////////// \t ////////// "); 


delay(3000); 

  }
  if(moving ==true){
   for (brightness = 0; brightness <= 255; brightness += 15) {
    delay(200);
digitalWrite(8,HIGH);
delay(200);
analogWrite(3, brightness); //uses PWM

delay(200);
 // Wait for 30 millisecond(s)
analogWrite(5, brightness); //uses PWM

delay(200); // Wait for 30 millisecond(s)

analogWrite(9, brightness); //uses PWM

 delay(200);
digitalWrite(8,LOW);
delay(200);
}
delay(3000);

for (brightness = 255; brightness >= 0; brightness -= 15) {
   delay(200);
digitalWrite(8,HIGH);
delay(200);

analogWrite(3, brightness);

delay(200);
analogWrite(5, brightness); //uses PWM

delay(200); // Wait for 30 millisecond(s)

analogWrite(9, brightness); //uses PWM

 delay(200);
digitalWrite(8,LOW);
delay(200);

}
  delay(1000);

 moving = false;


}
}


  
  


   
  
 

int readUltrasonicDistance(int triggerPin, int echoPin){

int distance;

digitalWrite(triggerPin, LOW);

delay(30);

digitalWrite(triggerPin, HIGH);

delay(30);

digitalWrite(triggerPin, LOW);

// distance = time / speed = (duration / 2) / speed

// 29 is the speed of sound and duration is divided by 2 since the

// wave goes in the direction of the object and then backward.

distance = pulseIn(echoPin, HIGH) / 2 / 29;

return distance;

}
