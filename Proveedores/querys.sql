CREATE VIEW costosPromedio as (
SELECT materia, industria, financieras.boleta, idinsumo, sum(unidades*costoUnitario)/sum(unidades) as costoPromedio FROM financieras, embarques where financieras.boleta=embarques.boleta group by idinsumo,boleta order by materia, industria, boleta)

CREATE VIEW costoC1 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo1 from costosPromedio,encadenamientos where industria='C'  and compradora='C' and idinsumo='1' and vendedora='A' group by boleta,idinsumo)


CREATE VIEW costoC2 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo2 from costosPromedio,encadenamientos where industria='C'  and compradora='C' and idinsumo='2' and vendedora='B' group by boleta,idinsumo)
CREATE VIEW costoD1 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo1 from costosPromedio,encadenamientos where industria='D'  and compradora='D' and idinsumo='1' and vendedora='C' group by boleta,idinsumo)
CREATE VIEW costoD2 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo2 from costosPromedio,encadenamientos where industria='D'  and compradora='D' and idinsumo='2' and vendedora='B' group by boleta,idinsumo)


CREATE VIEW costoE1 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo1 from costosPromedio,encadenamientos where industria='E'  and compradora='E' and idinsumo='1' and vendedora='C' group by boleta,idinsumo)
CREATE VIEW costoE2 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo2 from costosPromedio,encadenamientos where industria='E'  and compradora='E' and idinsumo='2' and vendedora='D' group by boleta,idinsumo)
CREATE VIEW costoF1 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo1 from costosPromedio,encadenamientos where industria='F'  and compradora='F' and idinsumo='1' and vendedora='D' group by boleta,idinsumo)


CREATE VIEW costoF2 as (
select materia,boleta,industria,idinsumo,costoPromedio*coeficiente as Costo2 from costosPromedio,encadenamientos where industria='F'  and compradora='F' and idinsumo='2' and vendedora='E' group by boleta,idinsumo)


Create view casiTotal as 
select materia,boleta,industria,idinsumo,Costo1
from costoC1
Union
select materia,boleta,industria,idinsumo,Costo2
from costoC2
Union
select materia,boleta,industria,idinsumo,Costo1
from costoD1
UNION
select materia,boleta,industria,idinsumo,Costo2
from costoD2
UNION
select materia,boleta,industria,idinsumo,Costo1
from costoE1
UNION
select materia,boleta,industria,idinsumo,Costo2
from costoE2
UNION
select materia,boleta,industria,idinsumo,Costo1
from costoF1
UNION
select materia,boleta,industria,idinsumo,Costo2
from costoF2

Create view TotalTodas as 
Select materia,boleta,industria,idinsumo,sum(Costo1)as Total from casiTotal group by boleta
UNION
select materia,boleta,industria,idinsumo,Sum(costoPromedio*coeficiente) as Costo2 from costosPromedio,encadenamientos where industria='A'   and compradora='A' group by boleta
UNION
select materia,boleta,industria,idinsumo,Sum(costoPromedio*coeficiente) as Costo2 from costosPromedio,encadenamientos where industria='B'   and compradora='B' group by boleta
