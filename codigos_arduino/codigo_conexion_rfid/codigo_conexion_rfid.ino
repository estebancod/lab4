#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 5
#define RST_PIN 22

MFRC522 rfid(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;
byte nuidPICC[4];

void setup() {
  Serial.begin(115200);

  SPI.begin();
  rfid.PCD_Init();
  Serial.print(F("Reader :"));
  rfid.PCD_DumpVersionToSerial();

  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }

  Serial.println();
  Serial.println("Iniciando el Programa");
}

void loop() {
  if (!rfid.PICC_IsNewCardPresent()) {
    return;
  }

  if (!rfid.PICC_ReadCardSerial()) {
    return;
  }

  Serial.print(F("PICC type: "));
  MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
  Serial.println(rfid.PICC_GetTypeName(piccType));

  if (piccType != MFRC522::PICC_TYPE_MIFARE_MINI &&
      piccType != MFRC522::PICC_TYPE_MIFARE_1K &&
      piccType != MFRC522::PICC_TYPE_MIFARE_4K) {
    Serial.println("Su Tarjeta no es del tipo MIFARE Classic.");
    return;
  }

  if (rfid.uid.uidByte[0] != nuidPICC[0] || rfid.uid.uidByte[1] != nuidPICC[1] || rfid.uid.uidByte[2] != nuidPICC[2] || rfid.uid.uidByte[3] != nuidPICC[3]) {
    Serial.println("Se ha detectado una nueva tarjeta.");

    for (byte i = 0; i < 4; i++) {
      nuidPICC[i] = 0;
    }

    for (byte i = 0; i < 4; i++) {
      nuidPICC[i] = rfid.uid.uidByte[i];
    }

    String DatoHex = printHex(rfid.uid.uidByte, rfid.uid.size);
    Serial.print("Codigo Tarjeta: ");
    Serial.println(DatoHex);

  } else {
    Serial.println("Tarjeta leida previamente");
  }

  rfid.PICC_HaltA();
  rfid.PCD_StopCrypto1();
}

String printHex(byte *buffer, byte bufferSize) {
  String DatoHexAux = "";
  for (byte i = 0; i < bufferSize; i++) {
    if (buffer[i] < 0x10) {
      DatoHexAux += "0";
    }
    DatoHexAux += String(buffer[i], HEX);
  }

  DatoHexAux.toUpperCase();
  return DatoHexAux;
}
