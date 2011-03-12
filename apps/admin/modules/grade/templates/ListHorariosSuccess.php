<?php use_stylesheet('grade'); ?>
<?php use_javascript('redips-drag-min.js'); ?>
<?php $professores = ProfessorPeer::doSelect(new Criteria()); ?>
<?php $disciplinas = DisciplinaPeer::doSelect(new Criteria()); ?>
<?php $locais = LocalPeer::doSelect(new Criteria()); ?>
<div id="grade">
<p class="title"><?php echo $grade->getDescription() ?></p>

<?php if(isset($periodos)): ?>
<div id="drag">
 <?php foreach($periodos as $periodo): ?>
  <?php include_partial('periodo',array('periodo'=> $periodo, 'professores' => $professores, 'locais'=> $locais, 'disciplinas'=> $disciplinas)); ?>
 <?php endforeach; ?>
 </div>
<?php else: ?>
Não foi possível incluir este período!
<?php endif; ?>
</div>
  <script type="text/javascript">
        REDIPS.drag.init()
    </script>