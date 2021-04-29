// Car presence detection using an ultrasonic sensor
// Kukuh Ardia Juniar

// Include Libraries
#include "Arduino.h"
#include <SPI.h>
#include <Ethernet.h>

// ETHERNET SHIELD -------------------------------------//
// Mac address, server, client init
byte mac[] = { 0xDE, 0xAD, 0xFE, 0xED, 0xBE, 0xEF };
IPAddress server(192, 168, 100, 138);
EthernetClient client;

unsigned long beginMicros, endMicros;

// Set trigPin and echoPin
const String IdSensor1 = "SR04_1";
const int trigPin1 = 9;   // Sensor 1
const int echoPin1 = 8;

const String IdSensor2 = "SR04_2";
const int trigPin2 = 7;   // Sensor 2
const int echoPin2 = 6;

const String IdSensor3 = "SR04_3";
const int trigPin3 = 5;   // Sensor 3
const int echoPin3 = 3;

const String IdSensor4 = "SR04_4";
const char trigPin4 = A1; // Sensor 4
const char echoPin4 = A2;

//const String jml_sensor = "4";

// Variable
long duration, distance, UltraSensor1, UltraSensor2, UltraSensor3, UltraSensor4;
int currentStateGlobal, currentState1, currentState2, currentState3, currentState4;
String data;

void setup() {
  Serial.begin(9600);

  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
    Serial.println("Gagal buka serial, Needed for native USB port only");
  }

  //  Ethernet Shield
  if(Ethernet.begin(mac) == 0){
    Serial.println("Gagal menkonfigurasi Internet menggunakan DHCP");

    // Cek Ethernet hardware sudah terhubung atau belum
    if(Ethernet.hardwareStatus() == EthernetNoHardware){
      Serial.println("Ethernet shield tidak ditemukan, gabisa lanjut tanpa ethernet shield :(");
      while (true) {
        delay(1); // do nothing, no point running without Ethernet hardware
      }
    }

    if(Ethernet.linkStatus() == LinkOFF){
      Serial.println("Kabel internet tidak terhubung.");
    }

  }else{
    Serial.print("DHCP IP: ");
    Serial.println(Ethernet.localIP());
  }
  
  Serial.println("Menghubungkan ke Server.... ");
  Serial.println("----------------------------------------------------");
  
  // Setup Ultrasensor1 and Ultrasensor2 
  pinMode(trigPin1, OUTPUT);
  pinMode(echoPin1, INPUT);
  pinMode(trigPin2, OUTPUT);
  pinMode(echoPin2, INPUT);
  pinMode(trigPin3, OUTPUT);
  pinMode(echoPin3, INPUT);
  pinMode(trigPin4, OUTPUT);
  pinMode(echoPin4, INPUT);
  
  //  Set State
  currentState1 = 0;
  currentState2 = 0;
  currentState3 = 0;
  currentState4 = 0;

  delay(3000);
  //  END SETUP FUNCTION
}

void loop() {
  // Measure distance 
  SonicSensor(trigPin1, echoPin1);
  UltraSensor1 = distance;
  SonicSensor(trigPin2, echoPin2);
  UltraSensor2 = distance;
  SonicSensor(trigPin3, echoPin3);
  UltraSensor3 = distance;
  SonicSensor(trigPin4, echoPin4);
  UltraSensor4 = distance;

  Serial.print("Yang terukur di sensor satu: ");
  Serial.print(UltraSensor1);
  Serial.println(" cm");
  Serial.print("Current State1: ");
  Serial.println(currentState1);

  Serial.print("Yang terukur di sensor dua: ");
  Serial.print(UltraSensor2);
  Serial.println(" cm");
  Serial.print("Current State2: ");
  Serial.println(currentState2);

  Serial.print("Yang terukur di sensor tiga: ");
  Serial.print(UltraSensor3);
  Serial.println(" cm");
  Serial.print("Current State3: ");
  Serial.println(currentState3);

  Serial.print("Yang terukur di sensor empat: ");
  Serial.print(UltraSensor4);
  Serial.println(" cm");
  Serial.print("Current State4: ");
  Serial.println(currentState4);
  Serial.println("");

  CekDistance(UltraSensor1, currentState1);
  currentState1 = currentStateGlobal;
  
  CekDistance(UltraSensor2, currentState2);
  currentState2 = currentStateGlobal;

  CekDistance(UltraSensor3, currentState3);
  currentState3 = currentStateGlobal;

  CekDistance(UltraSensor4, currentState4);
  currentState4 = currentStateGlobal;

  //  updateDB
  //  data = "sensor1=SensorSatu&data1=1"; // TEST
  data = "jumlah=4&sensor1="+ IdSensor1 +"&data1="+ currentState1 +"&sensor2="+ IdSensor2 +"&data2="+ currentState2 +"&sensor3="+ IdSensor3 +"&data3="+ currentState3 +"&sensor4="+ IdSensor4 +"&data4="+ currentState4; // Format
  if (client.connect(server, 80)) {
    Serial.println("======== Terhubung pada server ==========");
    
    client.println("POST /carPresence/public/updateSensor HTTP/1.1");
    client.print("Host: ");
    client.println(Ethernet.localIP());
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data);

    Serial.println("Data berhasil terkirim!");
  } else {
    Serial.println("Koneksi gagal, terjadi kesalahan.");
  }

  respon();
  Serial.println("----------------------------------------------------");
  
  if (client.connected()) {
//      Serial.println();
//      Serial.println("disconnecting.");
//      Serial.println("==================================");
//      Serial.println("");
      client.stop();
//      for(;;);
  }

  Serial.println("");
  delay(9000); // Menunggu 9 sec
}

// Mengukur jarak menggunakan gelombang ultrasonic
void SonicSensor(char trigPinSensor, char echoPinSensor){
  digitalWrite(trigPinSensor, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPinSensor, HIGH);  // Turn trigPin high
  delayMicroseconds(10);
  digitalWrite(trigPinSensor, LOW);

  // Membaca jarak
  duration = pulseIn(echoPinSensor, HIGH);
  distance = duration*0.034/2;
}

// Cek jarak, jika kurang dari 5 cm maka update DB
void CekDistance(long jarak, int currentState){
  if(jarak == 0){
    // Deteksi keberadaan mobil
    currentStateGlobal = 2;
  }else if (jarak < 10){
    // Deteksi masalah pada alat sensor
    currentStateGlobal = 1;
  }else {
    // Deteksi tidak adanya mobil
    currentStateGlobal = 0;   
  }
}

//Respon Server
void respon(){
    Serial.println("");
    if (client.available()) {
    char c = client.read(); // Membaca respon server
    Serial.print(c);
  }
}
