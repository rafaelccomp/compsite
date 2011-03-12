<?php if(isset($periodo)): ?>

<p class="periodo"><?php echo $periodo->getDescription() ?></p>
<?php $horarios = HorarioPeer::doSelect(new Criteria());?>
<?php $weekDays = WeekPeer::doSelect(new Criteria()); ?>


<table id="periodo<?php echo $periodo->getId() ?>">
    <tr>
      <td> Horário </td>
      <?php foreach($weekDays as $wd): ?>
      <td class="mark"> <?php echo $wd->getDescription(); ?> </td>
      <?php endforeach; ?>
      <?php foreach($horarios as $horario): ?>
        <tr>
           <td><?php echo $horario->getInicio()." <br/>".$horario->getFim(); ?></td>
             <?php $c = new Criteria(); ?>
             <?php //$c->add(GradeunitPeer::WEEKDAY_ID, $wd->getId()); ?>
             <?php $c->add(GradeunitPeer::PERIODO_ID, $periodo->getId()); ?>
             <?php $c->add(GradeunitPeer::HORARIO_ID, $horario->getId()); ?>
             <?php $gradeUnit = GradeunitPeer::doSelect($c); ?>
           
           <?php foreach($weekDays as $wd): ?>
           <td class="handler">
             <?php if(count($gradeUnit)>0): $j=0;?>
               <?php if($gradeUnit[$j]->getWeekdayId()==$wd->getId()):?>
                <?php include_partial('gradeunit',array('gradeUnit'=> $gradeUnit[$j++])); ?>
                <?php continue; ?>
            <?php endif; ?>
            <?php endif; ?>
              <?php include_partial('gradeunitempty'); ?>
          </td>
         <?php endforeach; //days?>
         </tr>
         <?php endforeach; //horarios ?>
        </table>
        <table> <tr><td class="trash">Trash</td></tr></table>
    <?php else: ?>
        Não foi possível renderizar este período.
    <?php endif; ?>