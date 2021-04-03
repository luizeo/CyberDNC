#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
valor = opc.read('Galaxy.rfanuc.dryrun')[0]
if valor == True:
  opc.write(('Galaxy.wfanuc.wdryrun',False))
else:
  opc.write(('Galaxy.wfanuc.wdryrun',True))
opc.close()