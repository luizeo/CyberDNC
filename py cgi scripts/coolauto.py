#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
opc.write(('Galaxy.wfanuc.wcooloff',False))
opc.write(('Galaxy.wfanuc.wcoolon',False))
opc.write(('Galaxy.wfanuc.wcoolauto',True))
opc.close() 