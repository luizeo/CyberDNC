#!C:\Python27\python.exe

import OpenOPC      
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
opc.write(('Galaxy.wfanuc.wedit',False))
opc.write(('Galaxy.wfanuc.wmdi',False))
opc.write(('Galaxy.wfanuc.wjog',False))
opc.write(('Galaxy.wfanuc.wauto',True))
opc.close() 