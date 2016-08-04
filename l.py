import RPi.GPIO as GPIO
import MySQLdb
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(17,GPIO.OUT)
GPIO.setup(27,GPIO.OUT)
GPIO.output(17,GPIO.LOW)
GPIO.output(27,GPIO.LOW)
#db=MySQLdb.connect("localhost","root","123","vehiclesystem")
#cursor=db.cursor()
while 1:
    db=MySQLdb.connect("localhost","root","123","vehiclesystem")
    cursor=db.cursor()
    count=0
    cnt=0
   # db=MySQLdb.connect("localhost","root","123","vehiclesystem")
   # cursor=db.cursor()
   # lat=145.0
   # cursor.execute()
   # sql="""UPDATE Owner set Mobile_no=Mobile_no+1 where sex='%c'""" % ('M')
   # sql="""Update Owner set Mobile_no=12345"""
   # print 'hi'
   # a="12345"
   # sql="""Insert into Owner(Unique_id,Name,Address,Sex,Official_id,Mobile_no)
   #       values ('%s','%s','%s','%s','%s','%s')""" % ('102','Amit','Hubli','M','000','1234567891')
   #  cursor.execute(sql)
   # print 'h'
   # cursor.close()
   # cursor.execute(sql)
   # db.commit()
   #  print 'chck'
   # results=cursor.fetchall()
   # for row in results:
   #     print row
    sql1="""select vehicle_no from Register_vehicle where Lattitude > (select Glatitude from GPS)
          and Lattitude < (select G1latitude from GPS) and Longitude <(select Glongitude from GPS)
          and Longitude >(select G1longitude from GPS) and vehicle_no='%s'""" % ('KA25BB1020')
    cursor.execute(sql1)
    results=cursor.fetchall()
   # print results[0]
    for row in results:
        print row
        if row[0]=="KA25BB1020":
            print 'valid'
            cnt=1
            print cnt
            GPIO.output(27,GPIO.HIGH)
        
    if cnt==0:
        GPIO.output(27,GPIO.LOW)
   # GPIO.output(27,GPIO.LOW)
   #  GPIO.output(27,GPIO.HIGH)
    sql2="""select vehicle_no,flag from Register_vehicle where flag='%d'""" % (1)
    cursor.execute(sql2)
    results=cursor.fetchall()
    for row in results:
       print row[0]
       print row[1]
       if row[0]=="KA25BB1020" and row[1]==1:
          count=1
          print "lights on"
          GPIO.output(17,GPIO.HIGH)
    if count==0:
          print "lights off"
          GPIO.output(17,GPIO.LOW)
    #      print 'wel'
    #      GPIO.output(17,GPIO.LOW)
          
   
