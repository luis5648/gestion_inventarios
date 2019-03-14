#!/usr/bin/python
# -*- coding: utf8 -*-

from fpdf import FPDF
import mysql.connector


#db statements start
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="inventario_ucta"
)

cursor = mydb.cursor()

#consulta para saber lo que hay en la tabla de las modificaciones.
#cursor.execute("SELECT ID_REPORTE, ID_EQUIPO, Descripcion, Modelo, N_serie, Ubicacion, Marca, ID_Categoria, ID_Propietario FROM EQUIPOS_MODIFICADO inner join  on equipos ")

res = cursor.fetchall()
#db end

pdf = FPDF()
pdf.add_page()


#generate header

pdf.set_margins(10, 10)
pdf.image('LogoCTA.png', 5, 5, 30)
pdf.set_font('Arial', 'B', 16)
pdf.cell(30)
pdf.cell(120, 10, 'Reporte de equipose modificados', 0, 0, 'C')
pdf.ln(20)

#body
pdf.set_fill_color(232, 232, 232)
pdf.set_font('Arial', 'B', 9)

pdf.cell(25, 6, 'ID del  reporte', 0, 0, 'C', 1)
pdf.cell(30, 6, 'ID del  equipo',0,0,'C',1)
pdf.cell(30, 6, 'Campo antiguo',0,0,'C',1)
pdf.cell(30, 6, 'Nuevo campo',0,0,'C',1)
pdf.cell(30, 6, 'Usuario',0,0,'C',1)
pdf.cell(40, 6, u'Fecha de modificación', 0, 1, 'C', 1)

for data in res:

    pdf.cell(25, 6, str(data[0]), 1, 0, 'C')
    pdf.cell(30, 6, str(data[1]), 1, 0, 'C')
    pdf.cell(30, 6, str(data[2]), 1, 0, 'C')
    pdf.cell(40, 6, str(data[3]), 1, 1, 'C')

#footer
pdf.set_y(-15)
pdf.set_font('Arial', 'I', 8)
pdf.cell(0, 10, 'Pagina %s' % pdf.page_no(), 0, 0, 'C' )



pdf.output('reporte.pdf', 'F')

