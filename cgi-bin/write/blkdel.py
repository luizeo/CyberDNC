#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
valor = opc.read('Galaxy.rfanuc.blkdel')[0]
if valor == True:
  opc.write(('Galaxy.wfanuc.wblkdel',False))
else:
  opc.write(('Galaxy.wfanuc.wblkdel',True))
opc.close()