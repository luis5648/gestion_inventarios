#!/usr/bin/python
# -*- coding: utf8 -*-

from fpdf import FPDF
import mysql.connector


#db statements start
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="inventario_ucta_t"
)

query = mydb.cursor()




obtenerUsuario = "SELECT * from modEquiposRes"


query.execute(obtenerUsuario)

res = query.fetchall()
#db end

pdf = FPDF()
pdf.add_page()


#generate header

pdf.set_margins(10, 10)
pdf.image('LogoCTA.png', 5, 5, 30)
pdf.set_font('Arial', 'B', 16)
pdf.cell(30)
pdf.cell(120, 10, 'Reporte de equipos modificados', 0, 0, 'C')
pdf.ln(20)

#body
pdf.set_fill_color(255, 255, 255)
pdf.set_font('Arial', '', 8)

#pdf.cell(25, 6, 'ID del  reporte', 0, 0, 'C', 1)
#pdf.cell(30, 6, 'ID del  equipo',0,0,'C',1)
#pdf.cell(30, 6, 'Campo antiguo',0,0,'C',1)
#pdf.cell(30, 6, 'Nuevo campo',0,0,'C',1)
#pdf.cell(30, 6, 'Usuario',0,0,'C',1)
#pdf.cell(40, 6, u'Fecha de modificación', 0, 1, 'C', 1)

for data in res:

    pdf.cell(50, 6, "ID reporte: "+str(data[0])+", ", 1, 0, 'L',1)
    pdf.cell(50, 6, "ID de equipo anterior: "+str(data[1])+", ", 0, 0, 'L',1)
    pdf.cell(50, 6, u"Descripcion anterior: "+str(data[2])+", ", 0, 1, 'L',1)
    pdf.cell(50, 6, u"Modelo anterior: "+str(data[3]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Numero de serie anterior: "+str(data[4]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Ubicacion anterior: "+str(data[5]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Marca anterior: "+str(data[6]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Categoria anterior: "+str(data[7]), 0, 0, 'L',1)
    pdf.cell(50, 6, 'Propietario anterior: '+str(data[8]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"ID de equipo actual: "+str(data[9]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Descripcion actual: "+str(data[10]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Modelo actual: "+str(data[11]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Numero de serie actual: "+str(data[12]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Ubicacion actual: "+str(data[13]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Marca actual: "+str(data[14]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Categoria actual: "+str(data[15]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Propietario actual: "+str(data[16]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Usuario que modifica: "+str(data[17]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Fecha de modificacion: "+str(data[18]), 0, 0, 'L',1)

#footer

pdf.set_font('Arial', 'I', 8)
#pdf.cell(0, 10, 'Pagina %s' % pdf.page_no(), 0, 0, 'C' )



pdf.output('reporte.pdf', 'F')

