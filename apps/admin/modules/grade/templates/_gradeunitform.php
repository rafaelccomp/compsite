 <form id="gradeUnitForm<?php echo $gradeUnit->getId() ?>" >
                <span class="gradeUnitDisc">
                    <select>
                    <?php foreach($disciplinas as $disc): ?>
                        <option value='<?php echo $disc->getDescription() ?>'
                                <?php echo ($disc->getId()== $gradeUnit->getDisciplinaId()) ? "selected":""; ?>>
                                <?php echo $disc->getDescription() ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </span>
                <span class="gradeUnitProfessor">
                    <select>
                    <?php foreach($professores as $prof): ?>
                        <option value='<?php echo $prof->getName() ?>'
                                <?php echo ($prof->getId()== $gradeUnit->getProfessorId()) ? "selected":""; ?>>
                                <?php echo $prof->getName() ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </span>
                <span class="gradeUnitLocal">
                    <select>
                    <?php foreach($locais as $local): ?>
                        <option value='<?php echo $local->getDescription() ?>'
                                <?php echo ($local->getId()== $gradeUnit->getLocalId()) ? "selected":""; ?>>
                                <?php echo $local->getDescription() ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </span>
                <span class="gradeUnitLocal"> <input type="submit" value="Ok" title="Ok"/> </span>
               </form>