<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
//print_r($questionnaires);
?>
<div class="container-fluid">

  <h4>Questionnaires</h4>
  <form id="form-questionnaire" class="form-horizontal" name="questionnaire" method="POST" action="<?php echo base_url('quest');?>">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th><strong>#</strong></th>
            <th>Questions</th>
            <th colspan="5">Options</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        foreach($questionnaires as $questionnaire) { ?>
            <tr>
              <th scope="row"><?php echo $i;?></th>
              <td><?php echo $questionnaire->questionnaire_text;?></td>                               
              <?php foreach ($questions as $question) { 
                $j = 1;
                if ($questionnaire->id === $question->questionnaire_id) {
                ?>
                <td>
                  <div class="text-center">
                    <input type="radio" name="qrid_<?php echo $questionnaire->id;?>" value="qsid_<?php echo $question->id;?>"/>
                    <?php echo preg_replace('/(\D+.\:)/','',$question->question_text);?>
                  </div>
                </td>
                <?php 
                }
                $j++;
              } ?>                         
            </tr>            
        <?php 
        $i++;
        }
        ?>
        </tbody>
      </table>
      <div class="row">
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary" value="<?=$session_part;?>">SUBMIT</button>
        </div>
      </div>
  </form>  

</div>