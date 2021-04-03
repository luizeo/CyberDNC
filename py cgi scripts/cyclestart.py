  #!C:\Python27\python.exe

  #import cgi
  #import cgitb; cgitb.enable()  # for troubleshooting 
  import OpenOPC      
  opc = OpenOPC.open_client('164.41.17.37')
  opc.connect('Kepware.KEPServerEX.V5')
  print opc.read('Galaxy.rfanuc.doorclslkd')
  opc.close() 
