#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
valor = opc.read('Galaxy.rfanuc.singblk')[0]
if valor == True:
  opc.write(('Galaxy.wfanuc.wsingblk',False))
else:
  opc.write(('Galaxy.wfanuc.wsingblk',True))
opc.close()