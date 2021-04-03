#!C:\Python27\python.exe

import OpenOPC 
import time
opc = OpenOPC.open_client('localhost')
opc.connect('Kepware.KEPServerEX.V5')
opc.write(('Galaxy.wfanuc.wzp',True))
time.sleep(3)
opc.write(('Galaxy.wfanuc.wzp',False))
opc.close()