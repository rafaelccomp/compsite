<?php
/* $gradeUnits for the weekDay;
 * $weekDay : the current weekday
 * $horarios : all horarios avaliable
 * 
 */
?>
<table>
    <tr> <td> <span class="gradeUnitWeekDay"><?php echo $weekDay->getDescription(); ?> </span> </td></tr>
    <?php for($i=0, $j=0; $i<count($horarios); $i++):?>
    <?php if(count($gradeUnits)>0) $gradeUnit = $gradeUnits[$j];?>
    <tr>
        <td>
            <?php if(count($gradeUnits)>0 && $gradeUnit->getHorarioId()==$horarios[$i]->getId()): ?>
            
            <div class="gradeUnitDiv" onmouseover="$(this).addClass('gradeUnitDivSelected');" onmouseout="$(this).removeClass('gradeUnitDivSelected');">
                <span class="gradeUnitDisc" > <?php echo $gradeUnit->getDisciplina()->getDescription(); ?> </span>
                <span id="professorSpan" class="gradeUnitProfessor" ondblclick="$(this).html(changeProf(this))"> <?php echo $gradeUnit->getProfessor()->getName(); ?> </span>
                <span class="gradeUnitLocal"> <?php echo $gradeUnit->getLocal()->getDescription(); ?> </span>
            </div>
            <?php else: ?>
            <div class="gradeUnitDiv" onmouseover="$(this).addClass('gradeUnitDivSelected');" onmouseout="$(this).removeClass('gradeUnitDivSelected');">
                <span class="gradeUnitDisc" > &nbsp; </span>
                <span id="professorSpan" class="gradeUnitProfessor" ondblclick="$(this).html(changeProf(this))"> &nbsp; </span>
                <span class="gradeUnitLocal"> &nbsp; </span>
            </div>
            <?php endif;?>
        </td>
    </tr>
    <?php endfor; ?>    
</table>