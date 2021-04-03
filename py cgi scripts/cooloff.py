#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
opc.write(('Galaxy.wfanuc.wcoolauto',False))
opc.write(('Galaxy.wfanuc.wcoolon',False))
opc.write(('Galaxy.wfanuc.wcooloff',True))
opc.close() 