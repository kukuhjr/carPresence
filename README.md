# CarPresence

Aplikasi yang menampilkan denah parkir dengan statusnya (kosong / terisi).
Kondisi: Perangkat keras dengan Komputer terhubung pada satu router yang sama.

## Builds

-   PHP (Laravel framework)
-   Apache Server
-   Mysql DB

## Perangkat keras

-   Arduino
-   Ultrasonic Sensor
-   Ethernet Shield

## Step

-   Pasang Arduino dengan Ethernet Shield, kemudian sambung dengan kabel LAN

-   Pasang Ultrasonic Sensord dengan konfigurasi trigpin dan echopin berikut:

```
    // Sensor 1 (Digital)
    trigPin1 = 9    // Kabel Trig dihubungkan pada port 9
    echoPin1 = 8    // Kabel Echo dihubungkan pada port 8

    // Sensor 2 (Digital)
    trigPin2 = 7
    echoPin2 = 6

    // Sensor 3 (Digital)
    trigPin3 = 5
    echoPin3 = 3

    // Sensor 4 (Analog)
    trigPin4 = A1
    echoPin4 = A2
```

-   Atur konfigurasi IP pada file Arduino (pastiin arduino dan komputermu satu router yang sama).

```
    IPAddress server(192, 168, XXX, XXX); // Sesuaikan dengan IP Address komputermu
```

-   Jalankan apache server dan mysql server

## Status pada aplikasi

-   Berubah menjadi berwarna merah jika sensor mendeteksi < 10 cm dan hijau jika sebaliknya
-   Berubah menjadi berwarna kuning jika kabel terputus
