
#include "Arduino.h"
#include <EEPROM.h>
#include <EDB.h>
#include <string.h>

#define TABLE_SIZE 200

#define RECORDS_TO_CREATE 10

int x=1;
void writer(unsigned long address, byte data)
{
  EEPROM.write(address, data);
}

byte reader(unsigned long address)
{
  return EEPROM.read(address);
}


EDB db(&writer,&reader);
//EDB db;

#define MY_TBL 1

struct MyLoc
{ 
  int id;
  double sx;
  double sy;
  double ex;
  double ey;
  int sp;
} myloc;

void setup()
{
  delay(4000);
  Serial.begin(9600);
  
}


void loop()
{
  delay(4000);
  if(x=1)
  {
   selectALL();
  }

   x=2;
  
  delay(4000);
}

void selectALL()
{
  int recno=0;
  Serial.println("EEPROM DB Library Demo");
  Serial.println();

  Serial.print("Creating Table...");
  
  db.create(0, TABLE_SIZE, sizeof(myloc));

  
  Serial.print("Record Count: "); Serial.println(db.count());

  db.open(MY_TBL);
  Serial.println("DONE opening ");

  Serial.print("Creating records...");
//  int recno;
  for (int recno = 1; recno <=10; recno++)
  {
    myloc.id = recno;
    myloc.sx = recno *2;
    myloc.sy = recno *3;
    myloc.ex = recno *4;
    myloc.ey = recno *5;
    myloc.sp = recno*10;
    
    
    db.appendRec(EDB_REC myloc);
    }

    

  Serial.print("Record Count: "); 
  Serial.println(db.count());

  Serial.println();
  Serial.println("Reading records from EEPROM...");
  Serial.println("-----"); 
  //recno=0;
  //selectALL();
  int y;
  for (y = 1; y <= RECORDS_TO_CREATE; y++)
  {
    db.readRec(y, EDB_REC myloc);
    Serial.print("ID: "); Serial.println(myloc.id); 
    Serial.print("Starting X: "); Serial.println(myloc.sx); 
    Serial.print("Starting y: "); Serial.println(myloc.sy);
    Serial.print("Ending x: "); Serial.println(myloc.ex);
    Serial.print("Ending y: "); Serial.println(myloc.ey);
    Serial.print("Speed: "); Serial.println(myloc.sp);
    Serial.println("-----");  
  }

   x=2;
 }

