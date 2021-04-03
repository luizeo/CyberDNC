#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
opc.write(('Galaxy.wfanuc.wcystop',True))
opc.write(('Galaxy.wfanuc.wcystop',False))
opc.close() 