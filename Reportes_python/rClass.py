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

class PDF(FPDF):
	def header(self):
		self.set_margins(10, 10)
		self.image('LogoCTA.png', 5, 5, 30)
		self.set_font('Arial', 'B', 16)
		self.cell(30)
		self.cell(120, 10, 'Reporte de equipose modificados', 0, 0, 'C')
		self.ln(20)

	def footer(self):
		#pdf.set_y(-13)
		pdf.set_font('Arial', 'I', 8)
		pdf.cell(0, 10, 'Pagina %s' % pdf.page_no(), 0, 0, 'C' )
		

pdf = FPDF()
pdf.add_page(orientation='L')

pdf.set_fill_color(232, 232, 232)
pdf.set_font('Arial', 'B', 8)

#pdf.cell(25, 6, 'ID del  reporte', 0, 0, 'C', 1)
#pdf.cell(30, 6, 'ID del  equipo',0,0,'C',1)
#pdf.cell(30, 6, 'Campo antiguo',0,0,'C',1)
#pdf.cell(30, 6, 'Nuevo campo',0,0,'C',1)
#pdf.cell(30, 6, 'Usuario',0,0,'C',1)
#pdf.cell(40, 6, u'Fecha de modificación', 0, 1, 'C', 1)

for data in res:

    pdf.cell(25, 6, "ID reporte: "+str(data[0]), 0, 1, 'L',1)
    pdf.cell(30, 6, "ID de equipo anterior: "+str(data[1]), 0, 1, 'L',1)
    pdf.cell(30, 6, "Descripcion anterior: "+str(data[2]), 0, 1, 'L',1)
    pdf.cell(40, 6, "Modelo anterior: "+str(data[3]), 0, 1, 'L',1)