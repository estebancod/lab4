#include <WiFi.h>
#include <HTTPClient.h>
#include <ESP32Servo.h>




const char* ssid = "Matias0421";
const char* password = "Esteban1223";
// Crear una instancia del objeto Servo
Servo myservo;

// Definir el pin del ESP32 al que está conectado el servo (D1 es GPIO 22)
const int servoPin = 13;
//el numero es el mismo de D13


const int salida = 2; // Pin GPIO para el LED
String estadoSalida = "on";

void setup() {
    Serial.begin(115200);
    myservo.attach(servoPin);
    //pinMode(salida, OUTPUT); // Configurar el pin como salida
    //digitalWrite(salida, LOW); // Asegurarse de que el LED esté apagado al inicio

    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.println("Conectando a WiFi...");
    }
    Serial.println("WiFi conectado.");
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());
}

void loop() {
    if (WiFi.status() == WL_CONNECTED) {
        // Realiza una solicitud HTTP GET al servidor PHP
        HTTPClient http;
        http.begin("http://192.168.18.170/Botom/estado_led.txt"); // Cambia esta URL según la IP de tu servidor
        int httpCode = http.GET();
        
        if (httpCode == HTTP_CODE_OK) {
            String response = http.getString();
            
            Serial.println("Respuesta del servidor: " + response);

            // Controlar el LED basado en la respuesta del servidor
            if (response.indexOf("OFF") >= 0) {
                Serial.println("GPIO off");
                //estadoSalida = "off";
                //digitalWrite(salida, LOW);
                myservo.write(0);
                

                
            } else if (response.indexOf("ON") >= 0) {
                Serial.println("GPIO on");
                //estadoSalida = "on";
                //digitalWrite(salida, HIGH);
                myservo.write(180);
                //delay(1000);
            }
        } else {
            Serial.println("Error en la solicitud HTTP");
        }
        http.end();
    } else {
        Serial.println("WiFi desconectado");
    }
    delay(5000); // Espera 5 segundos antes de repetir
}