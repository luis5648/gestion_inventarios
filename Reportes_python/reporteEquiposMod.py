#!/usr/bin/python
# -*- coding: utf-8 -*-

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
    pdf.cell(50, 6, u"Descripcion anterior: "+(data[2]).encode('ascii', 'ignore')+", ", 0, 1, 'L',1)
    pdf.cell(50, 6, u"Modelo anterior: "+(data[3]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Numero de serie anterior: "+str(data[4]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Ubicacion anterior: "+(data[5]).encode('ascii', 'ignore'), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Marca anterior: "+(data[6]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Categoria anterior: "+(data[7]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, 'Propietario anterior: '+(data[8]).encode('ascii', 'ignore'), 0, 1, 'L',1)
    pdf.cell(50, 6, u"ID de equipo actual: "+str(data[9]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Descripcion actual: "+(data[10]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Modelo actual: "+str(data[11]), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Numero de serie actual: "+str(data[12]), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Ubicacion actual: "+(data[13]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Marca actual: "+(data[14]).encode('ascii', 'ignore'), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Categoria actual: "+(data[15]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Propietario actual: "+(data[16]).encode('ascii', 'ignore'), 0, 0, 'L',1)
    pdf.cell(50, 6, u"Usuario que modifica: "+(data[17]).encode('ascii', 'ignore'), 0, 1, 'L',1)
    pdf.cell(50, 6, u"Fecha de modificacion: "+str(data[18]), 0, 0, 'L',1)

#footer

pdf.set_font('Arial', 'I', 8)
#pdf.cell(0, 10, 'Pagina %s' % pdf.page_no(), 0, 0, 'C' )



pdf.output('reporte.pdf', 'F')

