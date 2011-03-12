            <script type="text/javascript">
                    $(document).ready( function(){
                        $('#gradeUnitForm<?php echo $gradeUnit->getId() ?>').hide();
                        $('#flash<?php echo $gradeUnit->getId() ?>').hide();
                        $('#gradeUnitForm<?php echo $gradeUnit->getId() ?>').submit(function(){
                            $.ajax({
                            url: "grade/changeGradeItem",
                            context: document.body,
                              success: function(){
                                $(this).addClass("done");
                            }
                            });
                            //make ajax call here
                            $('#gradeUnitForm<?php echo $gradeUnit->getId() ?>').hide('slow');
                            $('#gradeUnitContent<?php echo $gradeUnit->getId() ?>').show();
                            $('#flash<?php echo $gradeUnit->getId() ?>').show('slow');

                        })
                        $('#gradeUnitContent<?php echo $gradeUnit->getId() ?>').dblclick( function(){
                            $('#gradeUnitContent<?php echo $gradeUnit->getId() ?>').hide();
                            $('#gradeUnitForm<?php echo $gradeUnit->getId() ?>').show();
                        })
                        }
                    );
               </script>
           <div class="gradeUnitDiv, drag" id="gradeUnitDiv<?php echo $gradeUnit->getId() ?>" onmouseover="$(this).addClass('gradeUnitDivSelected');" onmouseout="$(this).removeClass('gradeUnitDivSelected');">
               <div class="content" id="gradeUnitContent<?php echo $gradeUnit->getId() ?>">
                <span class="gradeUnitDisc"> <?php echo $gradeUnit->getDisciplina()->getDescriptionR(); ?> </span>
                <span class="gradeUnitProfessor"> <?php echo $gradeUnit->getProfessor()->getNameR(); ?> </span>
                <span class="gradeUnitLocal"> <?php echo $gradeUnit->getLocal()->getDescription(); ?> </span>
                <span class="flash" id="flash<?php echo $gradeUnit->getId() ?>">Item atualizado com sucesso.</span>
               </div>
           </div>
           <?php include_partial('gradeunitform', array('gradeUnit'=>$gradeUnit)); ?>